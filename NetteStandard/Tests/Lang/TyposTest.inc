<?php

/**
 * My clas is coool
 */
class MyRepflection
{

	/**
	 * Gets item on gifen index.
	 *
	 * @param  int
	 * @return mixed
	 */
	public function getItem($inddex)
	{
		return $this->items[$inddex];
	}

	public function setDescliption($descliption)
	{
		$debug = "Assigning descliption to itemz";
		$this->descliption = $descliption;
	}

}
