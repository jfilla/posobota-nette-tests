<?php declare (strict_types = 1);

namespace App\Presenters\Components\Order;

trait InjectFormFactory
{

	protected FormFactory $formFactory;

	public function injectFormFactory(FormFactory $formFactory): void
	{
		$this->formFactory = $formFactory;
	}

}
