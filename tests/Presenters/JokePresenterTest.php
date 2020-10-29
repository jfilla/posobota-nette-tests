<?php declare(strict_types = 1);

namespace AppTests\Presenters;

use App\Presenters\JokePresenter;
use AppTests\TestUtils\Mocks\InjectJokeApiMock;
use Wavevision\NetteTests\Runners\PresenterRequest;
use Wavevision\NetteTests\TestCases\PresenterTestCase;

class JokePresenterTest extends PresenterTestCase
{

	use InjectJokeApiMock;

	public function testDefault(): void
	{
		$this->jokeApiMock->setResponse('mocked joke');
		$this->assertStringContainsString(
			'mocked joke',
			$this->extractTextResponseContent(
				$this->runPresenter(new PresenterRequest(JokePresenter::class))
			)
		);
	}

}
