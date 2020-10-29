<?php declare(strict_types = 1);

namespace App\Presenters\Components\Order;

use App\Entities\Order;
use App\Models\InjectCreateOrder;
use App\Models\InjectItemRepository;
use Nette\Forms\Form;
use Nette\SmartObject;
use Nette\Utils\ArrayHash;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class FormHandler
{

	use InjectCreateOrder;
	use InjectItemRepository;
	use SmartObject;

	public function process(Form $form): Order
	{
		/** @var ArrayHash $values */
		$values = $form->getValues();
		return $this->createOrder->process(
			$values[FormFactory::QUANTITY],
			$this->itemRepository->findById($values[FormFactory::ITEM])
		);
	}

}
