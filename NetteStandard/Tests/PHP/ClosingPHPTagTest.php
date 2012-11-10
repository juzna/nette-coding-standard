<?php

namespace NetteStandard\Tests\PHP;

use AbstractSniffUnitTest;

/**
 *
 * @author Pavel Kouřil
 */
class ClosingPHPTagTest extends AbstractSniffUnitTest
{

	public function getErrorList($fileName = NULL)
	{
		$array = array();

		if (stripos($fileName, "ClosingPHPTagTest.2.inc") !== FALSE) {
			$array[3] = 1;
		}

		return $array;
	}

	protected function getWarningList($filenName = NULL)
	{
		return array();
	}

}
