<?php declare(strict_types = 1);

namespace AppTests\TestUtils\Mocks;

use App\Models\JokeApi;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(name="jokeApi", generateInject=true)
 */
class JokeApiMock extends JokeApi
{

	private string $response;

	public function setResponse(string $response): self
	{
		$this->response = $response;
		return $this;
	}

	public function get(): string
	{
		return $this->response;
	}

}
