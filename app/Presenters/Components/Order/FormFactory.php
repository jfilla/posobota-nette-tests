<?php declare(strict_types = 1);

namespace App\Presenters\Components\Order;

use App\Entities\Item;
use App\Models\InjectItemRepository;
use Nette\Application\UI\Form;
use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\Utils\Arrays;
use function sprintf;

/**
 * @DIService(generateInject=true)
 */
class FormFactory
{

	use SmartObject;
	use InjectItemRepository;

	public const QUANTITY = 'quantity';

	public const ITEM = 'item';

	public const ITEM_A = 'itemA';

	public const ITEM_B = 'itemB';

	public function create(): Form
	{
		$form = new Form();
		$form->addInteger(self::QUANTITY, 'Quantity')
			->setRequired()
			->setDefaultValue(1);
		$form->addSelect(self::ITEM, 'Item')
			->setItems(
				Arrays::mapKeysFromValues(
					$this->itemRepository->findAll(),
					fn(Item $item): array => [
						$item->getId(),
						sprintf('Item %s (%s)', $item->getId(), $item->getPrice()),
					]
				)
			)
			->setRequired();
		$form->addSubmit('order', 'Order now');
		return $form;
	}

}
