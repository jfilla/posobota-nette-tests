<?php declare(strict_types = 1);

namespace AppTests\TestUtils\Fixtures;

use App\Entities\Order;
use App\Models\Doctrine\InjectEntityManager;
use Nette\Utils\DateTime;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class OrderFixtures
{

	use InjectEntityManager;
	use InjectItemFixtures;

	public function createOrder(): Order
	{
		$order = new Order();
		$this->entityManager->persist($order);
		$order
			->setQuantity(1)
			->setDate(new DateTime())
			->setItem($this->itemFixtures->getItemA());
		return $order;
	}

}
