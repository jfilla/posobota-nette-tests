<?php declare(strict_types = 1);

namespace App\Models;

use App\Entities\Item;
use App\Entities\Order;
use App\Models\Doctrine\InjectEntityManager;
use DateTime;
use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class CreateOrder
{

	use InjectEntityManager;
	use InjectOrderFactory;
	use SmartObject;

	public function process(int $quantity, Item $item): Order
	{
		$order = $this->orderFactory->create();
		if ($quantity === 42) {
			throw new ForbiddenQuantity();
		}
		$order
			->setQuantity($quantity)
			->setDate(new DateTime())
			->setItem($item);
		$this->entityManager->flush();
		return $order;
	}

}
