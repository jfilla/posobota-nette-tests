<?php declare (strict_types = 1);

namespace AppTests\TestUtils\Mocks;

trait InjectJokeApiMock
{

	protected JokeApiMock $jokeApiMock;

	public function injectJokeApiMock(JokeApiMock $jokeApiMock): void
	{
		$this->jokeApiMock = $jokeApiMock;
	}

}
