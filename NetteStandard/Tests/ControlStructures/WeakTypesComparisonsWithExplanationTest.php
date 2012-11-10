<?php

namespace NetteStandard\ControlStructures;

use AbstractSniffUnitTest;


/**
*
*
* @author Jan Dolecek <juzna.cz@gmail.com>
 */
class ControlStructures_WeakTypesComparisonsWithExplanationTest extends AbstractSniffUnitTest
{

	public function getErrorList()
	{
		return array(
			26 => 1,
			30 => 1,
			34 => 1,
			38 => 1,
		);
	}

	protected function getWarningList()
	{
		return array(
		);
	}

}
