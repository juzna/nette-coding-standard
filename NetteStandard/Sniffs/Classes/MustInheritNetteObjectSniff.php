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
			T_ABSTRACT,
			T_EXTENDS
		);
	}

	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		// TODO: Implement process() method.
	}

}
