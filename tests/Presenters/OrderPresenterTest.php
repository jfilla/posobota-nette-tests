<?php declare(strict_types = 1);

namespace AppTests\Presenters;

use App\Presenters\OrderPresenter;
use Wavevision\NetteTests\Runners\PresenterRequest;
use Wavevision\NetteTests\TestCases\PresenterTestCase;

class OrderPresenterTest extends PresenterTestCase
{

	public function testDefault(): void
	{
		$this->assertStringContainsString(
			'Thank you',
			$this->extractTextResponseContent(
				$this->runPresenter(
					new PresenterRequest(OrderPresenter::class, OrderPresenter::DEFAULT_ACTION, ['id' => 1])
				)
			)
		);
	}

}
