<?php declare(strict_types = 1);

namespace App\Presenters;

use Nette\Application\BadRequestException;
use Nette\Application\Request;
use Nette\Application\UI\Presenter;
use Nette\Bridges\ApplicationLatte\Template;
use function is_file;

/**
 * @property Template $template
 */
final class Error4xxPresenter extends Presenter
{

	public function startup(): void
	{
		parent::startup();
		$request = $this->getRequest();
		if ($request !== null && !$request->isMethod(Request::FORWARD)) {
			$this->error();
		}
	}

	public function renderDefault(BadRequestException $exception): void
	{
		// load template 403.latte or 404.latte or ... 4xx.latte
		$file = __DIR__ . "/templates/Error/{$exception->getCode()}.latte";
		$this->template->setFile(is_file($file) ? $file : __DIR__ . '/templates/Error/4xx.latte');
	}

}
