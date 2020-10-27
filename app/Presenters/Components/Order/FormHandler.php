<?php declare(strict_types = 1);

namespace App\Presenters\Components\Order;

use Nette\Forms\Form;
use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class FormHandler
{

	use SmartObject;

	public function process(Form $form): void
	{
	}

}
