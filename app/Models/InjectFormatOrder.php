<?php declare (strict_types = 1);

namespace App\Models;

trait InjectFormatOrder
{

	protected FormatOrder $formatOrder;

	public function injectFormatOrder(FormatOrder $formatOrder): void
	{
		$this->formatOrder = $formatOrder;
	}

}
