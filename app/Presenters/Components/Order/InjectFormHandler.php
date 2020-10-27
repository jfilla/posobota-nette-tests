<?php declare (strict_types = 1);

namespace App\Presenters\Components\Order;

trait InjectFormHandler
{

	protected FormHandler $formHandler;

	public function injectFormHandler(FormHandler $formHandler): void
	{
		$this->formHandler = $formHandler;
	}

}
