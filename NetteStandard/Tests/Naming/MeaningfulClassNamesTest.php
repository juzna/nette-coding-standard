<?php

/**
 *
 *
 * @author Jan Dolecek <juzna.cz@gmail.com>
 */
class MeaningfulClassNamesTest extends AbstractSniffUnitTest
{

	public function getErrorList()
	{
		return array(
			4 => 1,
		);
	}

	protected function getWarningList()
	{
		return array(
			5 => 1,
		);
	}

}
