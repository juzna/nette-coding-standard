<?php

/**
 * Rule 1: "Always choose meaningful and specific names."
 *
 * @author Jan Dolecek <juzna.cz@gmail.com>
 */
class MeaningfulClassNamesSniff implements PHP_CodeSniffer_Sniff
{

	public function register()
	{
		return array(T_CLASS);
	}

	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		// TODO: Implement process() method.
	}

}
