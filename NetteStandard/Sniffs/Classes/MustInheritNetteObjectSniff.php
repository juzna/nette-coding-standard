<?php

namespace NetteStandard\Sniffs\Classes;

use PHP_CodeSniffer_Sniff;
use PHP_CodeSniffer_File;

/**
 * The ultimate ancestor of all instantiable classes should be Nette\Object.
 *
 * @author Pavel Kouřil
 */
class MustInheritNetteObjectSniff implements PHP_CodeSniffer_Sniff
{

	public function register()
	{
		return array(
			T_CLASS,
		);
	}

	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		$pExtends = $phpcsFile->findNext(T_EXTENDS, $stackPtr, $tokens[$stackPtr]['scope_opener']);
		if ( $pExtends === FALSE) {
			$phpcsFile->addError('Class not extending anything', $stackPtr);
			return;
		}

		$pEnd = $phpcsFile->findNext(
			array(T_NS_SEPARATOR, T_STRING, T_WHITESPACE),
			($pExtends + 1),
			null,
			/* exclude */true
		);

		$extends = trim($phpcsFile->getTokensAsString(($pExtends + 1), ($pEnd - $pExtends - 1)));
		$extends = $this->covertToFullClassName($phpcsFile, $stackPtr, $extends);

		if ($extends !== 'Nette\Object' && ! $this->isNetteObjectDescendant($extends)) {
			$phpcsFile->addError('Class not extending Nette\Object', $stackPtr);
		}
	}



	/**
	 * Convert local class name to full name
	 * @param  \PHP_CodeSniffer_File
	 * @param  int
	 * @param  string
	 * @return string
	 */
	private function covertToFullClassName(PHP_CodeSniffer_File $phpcsFile, $stackPtr, $extends)
	{
		// TODO: process all namespace + use statements to translate relative class name to a full name
		return ltrim($extends, '\\');
	}



	/**
	 * Check that a given class is descendant of Nette\Object
	 * @param  string
	 * @return bool
	 */
	private function isNetteObjectDescendant($extends)
	{
		// FIXME: this may be difficult when using only tokenizer
		return TRUE;
	}

}
