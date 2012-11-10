<?php

namespace NetteStandard\Tests\Scope;

use AbstractSniffUnitTest;


/**
 *
 *
 * @author Jan Dolecek <juzna.cz@gmail.com>
 */
class MethodScopeTest extends AbstractSniffUnitTest
{

	public function getErrorList()
	{
		return array(
			6  => 1,
			10 => 1,
			26 => 1,
			27 => 1,
			28 => 1,
		);
	}

	public function getWarningList()
	{
		return array();
	}

}
