<?php declare(strict_types = 1);

namespace App\Presenters;

use App\Models\InjectCalculator;
use App\Models\InjectOrderRepository;
use DateTime;
use Nette\Bridges\ApplicationLatte\Template;
use function sprintf;

/**
 * @property Template $template
 */
final class OrderPresenter extends BasePresenter
{

	use InjectOrderRepository;
	use InjectCalculator;

	public function actionDefault(int $id): void
	{
		$order = $this->orderRepository->findById($id);
		$this->template->setParameters(
			[
				'item' => sprintf('%s x Item %s', $order->getQuantity(), $order->getItem()->getId()),
				'price' => $this->calculator->calculate($order->getQuantity(), $order->getItem())->formatTo('cs'),
				'date' => $order->getDate()->format(DateTime::ISO8601),
			]
		);
	}

}
