<?php declare(strict_types = 1);

namespace App\Models;

use App\Entities\Order;
use Nette\Utils\DateTime;
use Wavevision\DIServiceAnnotation\DIService;
use function sprintf;

/**
 * @DIService(generateInject=true)
 */
class FormatOrder
{

	use InjectCalculator;

	/**
	 * @return array<mixed>
	 */
	public function process(Order $order): array
	{
		return [
			'item' => sprintf('%s x Item %s', $order->getQuantity(), $order->getItem()->getId()),
			'price' => $this->calculator->calculate($order->getQuantity(), $order->getItem())->formatTo('cs'),
			'date' => $order->getDate()->format(DateTime::ISO8601),
		];
	}

}
