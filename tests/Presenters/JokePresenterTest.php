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
		$mockedJoke = 'mocked joke';
		$this->jokeApiMock->setResponse($mockedJoke);
		$this->assertStringContainsString(
			$mockedJoke,
			$this->extractTextResponseContent(
				$this->runPresenter(new PresenterRequest(JokePresenter::class))
			)
		);
	}

}
