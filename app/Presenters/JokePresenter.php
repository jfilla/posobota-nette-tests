<?php declare(strict_types = 1);

namespace App\Presenters;

use App\Models\InjectGetJoke;

final class JokePresenter extends BasePresenter
{

	use InjectGetJoke;

	public function actionDefault(): void
	{
		$this->template->setParameters(['joke' => $this->getJoke->process()]);
	}

}
