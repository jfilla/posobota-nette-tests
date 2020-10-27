<?php declare (strict_types = 1);

namespace App\Models;

trait InjectItemRepository
{

	protected ItemRepository $itemRepository;

	public function injectItemRepository(ItemRepository $itemRepository): void
	{
		$this->itemRepository = $itemRepository;
	}

}
