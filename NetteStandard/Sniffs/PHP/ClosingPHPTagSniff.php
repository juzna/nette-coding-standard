<?php

namespace NetteStandard\Sniffs\PHP;

use PHP_CodeSniffer_Sniff;
use PHP_CodeSniffer_File;


/**
 * For files that contain only PHP code, the closing tag (?>) is never permitted.
 * Not including it prevents trailing whitespace from being accidentally injected into the output.
 *
 * @author Pavel Kouřil
 */
class ClosingPHPTagSniff implements PHP_CodeSniffer_Sniff
{

	public function register()
	{
		return array(
			T_CLOSE_TAG,
		);
	}

	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		if (substr($phpcsFile->getFilename(), -5) === "phtml") {
			return;
		}

		$error = "Files containing only PHP code shouldn't end with Close tag.";
		$phpcsFile->addError($error, $stackPtr, 'NotFound');
	}

}
