<?php declare(strict_types = 1);

namespace AppTests\Models;

use App\Entities\Item;
use App\Models\Calculator;
use AppTests\UnitTestCase;
use Brick\Money\Money;

class CalculatorTest extends UnitTestCase
{

	public function testCalculateQuantityCoe(): void
	{
		$this->checkAll(0, [['10', 1, '10'], ['20', 2, '10']]);
		$this->checkAll(-1, [['10', 1, '10'], ['10', 2, '10']]);
	}

	/**
	 * @param array<mixed> $items
	 */
	private function checkAll(int $quantityCoefficient, array $items): void
	{
		$calculator = new Calculator($quantityCoefficient);
		foreach ($items as $item) {
			$this->check($calculator, ...$item);
		}
	}

	private function check(
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
