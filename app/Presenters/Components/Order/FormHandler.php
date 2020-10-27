<?php declare(strict_types = 1);

namespace App\Presenters\Components\Order;

use App\Models\InjectCalculator;
use App\Models\InjectItemRepository;
use Nette\Forms\Form;
use Nette\SmartObject;
use Nette\Utils\ArrayHash;
use Wavevision\DIServiceAnnotation\DIService;
use function bdump;

/**
 * @DIService(generateInject=true)
 */
class FormHandler
{

	use SmartObject;
	use InjectCalculator;
	use InjectItemRepository;

	public function process(Form $form): void
	{
		/** @var ArrayHash $values */
		$values = $form->getValues();
		$item = $this->itemRepository->findById($values[FormFactory::ITEM]);
		$money = $this->calculator->calculate($values[FormFactory::QUANTITY], $item);
		bdump($money);
		bdump($money->formatTo('cs'));
	}

}
