<?php declare(strict_types = 1);

namespace App\Models;

use Nette\SmartObject;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true)
 */
class GetJoke
{

	use InjectJokeApi;
	use SmartObject;

	public function process(): string
	{
		return $this->jokeApi->get();
	}

}
