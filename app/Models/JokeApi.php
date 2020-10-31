<?php declare(strict_types = 1);

namespace App\Models;

use Nette\SmartObject;
use Nette\Utils\FileSystem;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService(generateInject=true, name="jokeApi")
 */
class JokeApi
{

	use SmartObject;

	public function get(): string
	{
		return FileSystem::read('https://sv443.net/jokeapi/v2/joke/Programming');
	}

}
