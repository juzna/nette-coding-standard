<?php

namespace NetteStandard\Tests\Lang;

use AbstractSniffUnitTest;


/**
 *
 *
 * @author Jan Dolecek <juzna.cz@gmail.com>
 */
class TyposTest extends AbstractSniffUnitTest
{

	public function getErrorList()
	{
		return array();
	}

	public function getWarningList()
	{
		return array(
			4 => 2,
			6 => 1,
			10 => 1,
			15 => 1,
			17 => 1,
			20 => 2,
			22 => 2,
			23 => 2,
		);
	}

}
