<?php declare(strict_types = 1);

namespace AppTests\Presenters;

use App\Models\Doctrine\InjectEntityManager;
use App\Presenters\OrderPresenter;
use AppTests\TestUtils\Fixtures\InjectOrderFixtures;
use Wavevision\NetteTests\Runners\PresenterRequest;
use Wavevision\NetteTests\TestCases\PresenterTestCase;

class OrderPresenterTest extends PresenterTestCase
{

	use InjectOrderFixtures;
	use InjectEntityManager;

	public function testDefault(): void
	{
		$order = $this->orderFixtures->createOrder();
		$this->entityManager->flush();
		$this->assertStringContainsString(
			'Thank you',
			$this->extractTextResponseContent(
				$this->runPresenter(
					new PresenterRequest(
						OrderPresenter::class,
						OrderPresenter::DEFAULT_ACTION,
						['id' => $order->getId()]
					)
				)
			)
		);
	}

}
