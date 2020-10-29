<?php declare(strict_types = 1);

namespace AppTests\Presenters;

use App\Entities\Item;
use App\Presenters\Components\Order\FormFactory;
use App\Presenters\HomepagePresenter;
use Wavevision\NetteTests\Runners\PresenterRequest;
use Wavevision\NetteTests\Runners\SubmitFormRequest;
use Wavevision\NetteTests\TestCases\PresenterTestCase;

class HomepagePresenterTest extends PresenterTestCase
{

	public function testDefaultRender(): void
	{
		$this->assertStringContainsString(
			'Item e-shop',
			$this->extractTextResponseContent(
				$this->runPresenter(new PresenterRequest(HomepagePresenter::class))
			)
		);
	}

	public function testDefaultSubmit(): void
	{
		$submitFormResponse = $this->submitForm(
			new SubmitFormRequest(
				'order-form',
				HomepagePresenter::class,
				HomepagePresenter::DEFAULT_ACTION,
				[],
				[
					FormFactory::QUANTITY => 1,
					FormFactory::ITEM => Item::ID_A,
				]
			)
		);
		$this->assertValidForm($submitFormResponse);
		$this->assertStringContainsString(
			'order/default/',
			$this->extractRedirectResponseUrl($submitFormResponse->getPresenterResponse())
		);
	}

}
