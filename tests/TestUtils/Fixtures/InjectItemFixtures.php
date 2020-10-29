<?php declare (strict_types = 1);

namespace AppTests\TestUtils\Fixtures;

trait InjectItemFixtures
{

	protected ItemFixtures $itemFixtures;

	public function injectItemFixtures(ItemFixtures $itemFixtures): void
	{
		$this->itemFixtures = $itemFixtures;
	}

}
