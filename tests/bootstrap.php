<?php
/**
 * Bootstrap for PHPUnit
 */

include_once 'tests/Core/AllTests.php';
include_once 'CodeSniffer.php';
include_once __DIR__ . '/AbstractSniffUnitTest.php';

spl_autoload_register(array('PHP_CodeSniffer', 'autoload'));
