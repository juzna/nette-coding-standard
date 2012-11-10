<?php

namespace NetteStandard\Sniffs\ControlStructures;

use PHP_CodeSniffer_Sniff;
use PHP_CodeSniffer_File;


/**
 * Comparison “strong typed” operators (=== and !==) are preferred before “weak typed” ones (== and !=). If weak typed
 * comparison operator is used, the intention must be documented with a comment.
 *
 * @author Jan Dolecek <juzna.cz@gmail.com>
 */
class WeakTypesComparisonsWithExplanationSniff implements PHP_CodeSniffer_Sniff
{
	/** @var array When an operator is used, then commend including the text must follow */
	public $commentMustInclude = array(
		T_IS_EQUAL => 'intentionally ==',
		T_IS_NOT_EQUAL => 'intentionally !=',
	);



	public function register()
	{
		return array(
			T_IS_EQUAL,
			T_IS_NOT_EQUAL,
		);
	}



	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		$tokens = $phpcsFile->getTokens();

		$stackPtrOperator = $stackPtr;
		$operatorCode = $tokens[$stackPtr]['code'];

		$hasComment = FALSE;

		// Read tokens until EOL
		for (; isset($tokens[$stackPtr]); $stackPtr++) {
			$code = $tokens[$stackPtr]['code'];
			$content = $tokens[$stackPtr]['content'];

			switch ($code) {
				case T_WHITESPACE:
					if (strpos($content, "\n") !== FALSE) break 2; // newline found -> stop reading
					break;

				case T_COMMENT:
					if (strpos($content, $this->commentMustInclude[$operatorCode]) !== FALSE) $hasComment = TRUE;
					if (strpos($content, "\n") !== FALSE) break 2; // newline found -> stop reading
					break;

			}
		}

		if ( ! $hasComment) {
			$phpcsFile->addError("Equals comparison must be commented with its purpose", $stackPtrOperator);
		}
	}

}
