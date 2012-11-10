Nette Coding Standard for PHP_CodeSniffer
=============================================

## Forks

Please use a [fixed fork](https://github.com/juzna/PHP_CodeSniffer) of CodeSniffer

WIP

## Usage

To use this ruleset, you have to download Code Sniffer and have it in your include path.

Then go to your sources directory and run following command:

	phpcs --standard=/path/to/ruleset.xml .


## Contributing

### Tests
Run tests with PHPUnit, but don't forget to add CodeSniffer source code to `include_path`:

    phpunit -dinclude_path=.:vendor/CodeSniffer:/usr/local/lib/php
