<?php declare (strict_types = 1);

namespace App\Models;

trait InjectCreateOrder
{

	protected CreateOrder $createOrder;

	public function injectCreateOrder(CreateOrder $createOrder): void
	{
		$this->createOrder = $createOrder;
	}

}
