<?php declare(strict_types = 1);

namespace App\Presenters;

use App\Models\InjectFormatOrder;
use App\Models\InjectOrderRepository;

final class OrderPresenter extends BasePresenter
{

	use InjectOrderRepository;
	use InjectFormatOrder;

	public function actionDefault(int $id): void
	{
		$this->template->setParameters(
			$this->formatOrder->process($this->orderRepository->findById($id))
		);
	}

}
