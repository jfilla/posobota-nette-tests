<?php declare (strict_types = 1);

namespace App\Models;

trait InjectJokeApi
{

	protected JokeApi $jokeApi;

	public function injectJokeApi(JokeApi $jokeApi): void
	{
		$this->jokeApi = $jokeApi;
	}

}
