<?php declare(strict_types = 1);

namespace App\Models;

use App\Entities\Order;
use App\Models\Doctrine\InjectEntityManager;
use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class OrderFactory
{

	use SmartObject;
	use InjectEntityManager;

	public function create(): Order
	{
		$order = new Order();
		$this->entityManager->persist($order);
		return $order;
	}

}
