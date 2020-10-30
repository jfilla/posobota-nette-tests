<?php declare(strict_types = 1);

namespace AppTests\Models;

use App\Models\Doctrine\InjectEntityManager;
use App\Models\InjectFormatOrder;
use AppTests\TestUtils\Fixtures\InjectOrderFixtures;
use Wavevision\NetteTests\TestCases\DIContainerTestCase;

class FormatOrderTest extends DIContainerTestCase
{

	use InjectFormatOrder;
	use InjectOrderFixtures;
	use InjectEntityManager;

	public function testProcess(): void
	{
		$order = $this->orderFixtures->createOrder();
		$this->entityManager->flush();
		$formattedOrder = $this->formatOrder->process($order);
		$this->assertEquals('1 x Item a', $formattedOrder['item']);
	}

}
