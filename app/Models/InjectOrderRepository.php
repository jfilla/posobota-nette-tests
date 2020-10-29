<?php declare (strict_types = 1);

namespace App\Models;

trait InjectOrderRepository
{

	protected OrderRepository $orderRepository;

	public function injectOrderRepository(OrderRepository $orderRepository): void
	{
		$this->orderRepository = $orderRepository;
	}

}
