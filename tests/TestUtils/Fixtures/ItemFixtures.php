<?php declare(strict_types = 1);

namespace AppTests\TestUtils\Fixtures;

use App\Entities\Item;
use App\Models\Doctrine\InjectEntityManager;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class ItemFixtures
{

	use InjectEntityManager;

	public function getItemA(): Item
	{
		return $this->getItem(Item::ID_A);
	}

	public function createItemA(): Item
	{
		return $this->createItem(Item::ID_A, '100');
	}

	public function createItemB(): Item
	{
		return $this->createItem(Item::ID_B, '10');
	}

	private function createItem(string $id, string $price): Item
	{
		$item = new Item();
		$item
			->setId($id)
			->setPrice($price);
		$this->entityManager->persist($item);
		return $item;
	}

	private function getItem(string $id): Item
	{
		/** @var Item $item */
		$item = $this->entityManager->find(Item::class, $id);
		return $item;
	}

}
