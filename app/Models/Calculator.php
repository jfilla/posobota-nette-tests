<?php declare(strict_types = 1);

namespace App\Models;

use App\Entities\Item;
use Brick\Math\RoundingMode;
use Brick\Money\Money;
use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;
use function pow;

/**
 * @DIService(generateInject=true, params={"%quantityCoefficient%"})
 */
class Calculator
{

	use SmartObject;

	private float $quantityCoefficient;

	public function __construct(float $quantityCoefficient)
	{
		$this->quantityCoefficient = $quantityCoefficient;
	}

	public function calculate(int $quantity, Item $item): Money
	{
		$price = Money::of($item->getPrice(), 'CZK');
		$price = $price->multipliedBy($this->quantityRatio($quantity), RoundingMode::HALF_EVEN);
		$price = $price->multipliedBy($quantity, RoundingMode::HALF_EVEN);
		return $price;
	}

	private function quantityRatio(int $quantity): float
	{
		return 1 / pow($quantity, 0 - $this->quantityCoefficient);
	}

}
