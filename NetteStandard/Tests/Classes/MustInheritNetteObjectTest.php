<?php

namespace NetteStandard\Tests\Classes;

use AbstractSniffUnitTest;

/**
 *
 * @author Pavel Kouřil
 */
class MustInheritNetteObjectTest extends AbstractSniffUnitTest
{

	public function getErrorList()
	{
		return array(
			12 => 1,
			14 => 1,
		);
	}

	protected function getWarningList()
	{
		return array();
	}

}
