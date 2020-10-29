<?php declare(strict_types = 1);

namespace AppTests\Models;

use App\Models\Doctrine\InjectEntityManager;
use App\Models\ForbiddenQuantity;
use App\Models\InjectCreateOrder;
use AppTests\TestUtils\Fixtures\InjectItemFixtures;
use Wavevision\NetteTests\TestCases\DIContainerTestCase;

class CreateOrderTest extends DIContainerTestCase
{

	use InjectCreateOrder;
	use InjectEntityManager;
	use InjectItemFixtures;

	public function testProcess(): void
	{
		$this->entityManager->flush();
		$this->expectException(ForbiddenQuantity::class);
		$this->createOrder->process(42, $this->itemFixtures->getItemA());
	}

}
