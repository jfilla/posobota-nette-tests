<?php declare (strict_types = 1);

namespace AppTests\TestUtils\Fixtures;

trait InjectOrderFixtures
{

	protected OrderFixtures $orderFixtures;

	public function injectOrderFixtures(OrderFixtures $orderFixtures): void
	{
		$this->orderFixtures = $orderFixtures;
	}

}
