<?php

namespace NetteStandard\Sniffs\Scope;

use PHP_CodeSniffer_File;
use PHP_CodeSniffer_Tokens;
use PHP_CodeSniffer_Standards_AbstractScopeSniff;

/**
 * Verifies that class members have scope modifiers, and interface members do not have a modifier.
 */
class MethodScopeSniff extends PHP_CodeSniffer_Standards_AbstractScopeSniff
{

	public function __construct()
	{
		parent::__construct(array(T_CLASS, T_INTERFACE), array(T_FUNCTION));
	}

	protected function processTokenWithinScope(PHP_CodeSniffer_File $phpcsFile, $stackPtr, $currScope)
	{
		$tokens = $phpcsFile->getTokens();

		$isClass = $tokens[$currScope]['code'] === T_CLASS;

		$methodName = $phpcsFile->getDeclarationName($stackPtr);
		if ($methodName === NULL) {
			return;
		}

		$pCurly = $phpcsFile->findPrevious(T_CLOSE_CURLY_BRACKET, $stackPtr);
		$modifier = $phpcsFile->findPrevious(PHP_CodeSniffer_Tokens::$scopeModifiers, $stackPtr, max($currScope, $pCurly));

		if ($isClass) {
			if (($modifier === FALSE) || ($tokens[$modifier]['line'] !== $tokens[$stackPtr]['line'])) {
				$error = 'No scope modifier specified for function "%s"';
				$data = array($methodName);
				$phpcsFile->addError($error, $stackPtr, 'Missing', $data);
			}

		} else {
			if ($modifier !== FALSE) {
				$error = 'Scope modifier specified for interface function "%s"';
				$data = array($methodName);
				$phpcsFile->addError($error, $stackPtr, 'Missing', $data);
			}
		}
	}

}
