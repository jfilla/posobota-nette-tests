<?php declare (strict_types = 1);

namespace App\Models;

trait InjectOrderFactory
{

	protected OrderFactory $orderFactory;

	public function injectOrderFactory(OrderFactory $orderFactory): void
	{
		$this->orderFactory = $orderFactory;
	}

}
