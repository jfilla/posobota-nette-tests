<?php declare(strict_types = 1);

namespace App\Models;

use App\Entities\Order;
use App\Models\Doctrine\InjectEntityManager;
use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class OrderRepository
{

	use InjectEntityManager;
	use SmartObject;

	public function findById(int $id): Order
	{
		/** @var Order $order */
		$order = $this->entityManager->find(Order::class, $id);
		return $order;
	}

}
