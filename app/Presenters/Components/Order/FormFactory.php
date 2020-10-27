<?php declare(strict_types = 1);

namespace App\Presenters\Components\Order;

use Nette\Application\UI\Form;
use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class FormFactory
{

	use SmartObject;

	public const QUANTITY = 'quantity';

	public const ITEM = 'item';

	public const ITEM_A = 'itemA';

	public const ITEM_B = 'itemB';

	public function create(): Form
	{
		$form = new Form();
		$form->addInteger(self::QUANTITY, 'Quantity')
			->setRequired();
		$form->addSelect(self::ITEM, 'Item')
			->setItems([self::ITEM_A => 'A', self::ITEM_B => 'B'])
			->setRequired();
		$form->addSubmit('order', 'Order now');
		return $form;
	}

}
