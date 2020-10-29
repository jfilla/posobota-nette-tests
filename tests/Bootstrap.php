<?php declare(strict_types = 1);

namespace AppTests;

use Nette\Configurator;

class Bootstrap
{

	public static function boot(): Configurator
	{
		$configurator = \App\Bootstrap::shared();
		$configurator
			->addConfig(__DIR__ . '/config/services.neon')
			->addConfig(__DIR__ . '/config/local.neon');
		return $configurator;
	}

}
