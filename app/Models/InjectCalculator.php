<?php declare (strict_types = 1);

namespace App\Models;

trait InjectCalculator
{

	protected Calculator $calculator;

	public function injectCalculator(Calculator $calculator): void
	{
		$this->calculator = $calculator;
	}

}
