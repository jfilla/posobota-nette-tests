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
		$this->assertEquals(Money::of('10', 'CZK'), $calculator->calculate(1, (new Item())->setPrice('10')));
	}

}
