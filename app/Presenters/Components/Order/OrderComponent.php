<?php declare (strict_types = 1);

namespace App\Presenters\Components\Order;

trait OrderComponent
{

	private ControlFactory $orderControlFactory;

	public function injectOrderControlFactory(ControlFactory $controlFactory): void
	{
		$this->orderControlFactory = $controlFactory;
	}

	protected function createComponentOrder(): Control
	{
		return $this->orderControlFactory->create();
	}

	protected function attachComponentOrder(Control $component): void
	{
		$this->addComponent($component, 'order');
	}

}
