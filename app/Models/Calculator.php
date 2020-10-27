<?php declare(strict_types = 1);

namespace App\Models;

use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class Calculator
{

	use SmartObject;

	public function calculate(int $quantity, float $price): float
	{
		return 4.2;
	}

}
