<?php
/**
 * A test suite for running all PHP_CodeSniffer unit tests.
 */

if(defined('PHP_CODESNIFFER_IN_TESTS') === false) {
	define('PHP_CODESNIFFER_IN_TESTS', true);
}



/**
 * A test class for running all PHP_CodeSniffer unit tests.
 * Usage: phpunit AllTests.php
 */
class PHP_CodeSniffer_AllTests
{

	public static function main()
	{
		PHPUnit_TextUI_TestRunner::run(self::suite());
	}



	public static function suite()
	{
		$baseDir = realpath(__DIR__ . '/../NetteStandard/Tests');
		return self::getSuite('PHP Nette Coding Standard', $baseDir, 'NetteStandard\\Tests');
	}



	public static function getSuite($suiteName, $baseDir, $baseNamespace)
	{
		// Use a special PHP_CodeSniffer test suite so that we can
		// unset our autoload function after the run.
		$suite = new PHP_CodeSniffer_TestSuite($suiteName);

		$di = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($baseDir));

		foreach ($di as /** @var SplFileInfo $file */ $file) {
			if(substr($file->getFilename(), 0, 1) === '.' || $file->getRealPath() === __FILE__) {
				continue;
			}

			// Tests must have the extension 'php'.
			$parts = explode('.', $file);
			$ext = array_pop($parts);
			if ($ext !== 'php') {
				continue;
			}

			$filePath  = $file->getPathname();
			$className = str_replace($baseDir . DIRECTORY_SEPARATOR, '', $filePath);
			$className = substr($className, 0, -4);
			$className = $baseNamespace . '\\' . str_replace(DIRECTORY_SEPARATOR, '\\', $className);

			include_once $filePath;
			$class = new $className($className . '::getErrorList');
			$suite->addTest($class);
		}

		// Unregister this here because the PEAR tester loads
		// all package suites before running then, so our autoloader
		// will cause problems for the packages included after us.
		spl_autoload_unregister(array('PHP_CodeSniffer', 'autoload'));

		return $suite;
	}

}
