<?php declare(strict_types = 1);

namespace App\Presenters\Components\Order;

use Nette\Application\UI\Form;
use Wavevision\DIServiceAnnotation\DIService;
use Wavevision\PropsControl\BaseControl;

/**
 * @DIService(generateComponent=true)
 */
class Control extends BaseControl
{

	use InjectFormFactory;
	use InjectFormHandler;

	public function render(): void
	{
		$this->getTemplate()->render();
	}

	protected function createComponentForm(): Form
	{
		$form = $this->formFactory->create();
		$form->onSuccess[] = function (\Nette\Forms\Form $form): void {
			$this->formHandler->process($form);
			$this->redirect('this');
		};
		return $form;
	}

}
