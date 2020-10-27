<?php declare(strict_types = 1);

namespace App\Router;

use Nette\Application\Routers\RouteList;
use Nette\Routing\Route;
use Nette\StaticClass;

final class RouterFactory
{

	use StaticClass;

	/**
	 * @return RouteList<Route>
	 */
	public static function createRouter(): RouteList
	{
		$router = new RouteList();
		$router->addRoute('<presenter>/<action>[/<id>]', 'Homepage:default');
		return $router;
	}

}
