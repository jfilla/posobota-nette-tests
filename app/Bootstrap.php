<?php declare(strict_types = 1);

namespace App;

use Nette\Configurator;

class Bootstrap
{

	public static function shared(): Configurator
	{
		$configurator = new Configurator();
		$configurator->enableTracy(__DIR__ . '/../log');
		$configurator->setTimeZone('Europe/Prague');
		$configurator->setTempDirectory(__DIR__ . '/../temp');
		$configurator->addConfig(__DIR__ . '/config/common.neon');
		return $configurator;
	}

	public static function boot(): Configurator
	{
		$configurator = self::shared();
		$configurator->addConfig(__DIR__ . '/config/local.neon');
		return $configurator;
	}

}
