<?php declare(strict_types = 1);

namespace App\Models;

use App\Entities\Item;
use App\Models\Doctrine\InjectEntityManager;
use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class ItemRepository
{

	use SmartObject;
	use InjectEntityManager;

	/**
	 * @return Item[]
	 */
	public function findAll(): array
	{
		/** @var Item[] $items */
		$items = $this->entityManager->getRepository(Item::class)->findAll();
		return $items;
	}

	public function findById(string $id): Item
	{
		/** @var Item $item */
		$item = $this->entityManager->find(Item::class, $id);
		return $item;
	}

}
