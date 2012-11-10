<?php
/**
 * Bootstrap for PHPUnit
 */

require_once 'PHPUnit/TextUI/TestRunner.php';
require_once 'tests/TestSuite.php';
include_once 'tests/Core/AllTests.php';
include_once 'CodeSniffer.php';
include_once __DIR__ . '/AbstractSniffUnitTest.php';

spl_autoload_register(array('PHP_CodeSniffer', 'autoload'));
