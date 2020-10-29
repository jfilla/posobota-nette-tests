<?php declare(strict_types = 1);

namespace AppTests\Models;

use App\Entities\Item;
use App\Models\Calculator;
use AppTests\UnitTestCase;
use Brick\Money\Money;

class CalculatorTest extends UnitTestCase
{

	public function testCalculate(): void
	{
		$calculator = new Calculator(0);
		$this->checkCalculator(
			$calculator,
			'10',
			1,
			'10'
		);
		$this->checkCalculator(
			$calculator,
			'20',
			2,
			'10'
		);
	}

	public function testCalculate2(): void
	{
		$calculator = new Calculator(-1);
		$this->checkCalculator(
			$calculator,
			'10',
			1,
			'10'
		);
		$this->checkCalculator(
			$calculator,
			'10',
			2,
			'10'
		);
	}

	private function checkCalculator(
		Calculator $calculator,
		string $expectedPrice,
		int $quantity,
		string $unitPrice
	): void {
		$this->assertEquals(
			Money::of($expectedPrice, 'CZK'),
			$calculator->calculate($quantity, (new Item())->setPrice($unitPrice))
		);
	}

}
