<?php declare (strict_types = 1);

namespace App\Presenters\Components\Order;

interface ControlFactory
{

	public function create(): Control;

}
