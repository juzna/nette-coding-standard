<?php

/**
 * Comparison “strong typed” operators (=== and !==) are preferred before “weak typed” ones (== and !=). If weak typed
 * comparison operator is used, the intention must be documented with a comment.
 *
 * @author Jan Dolecek <juzna.cz@gmail.com>
 */
class WeakTypesComparisonsWithExplanationSniff implements PHP_CodeSniffer_Sniff
{

	public function register()
	{
		return array(
			T_IS_EQUAL,
			T_IS_NOT_EQUAL,
		);
	}

	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		// TODO: Implement process() method.
	}

}
