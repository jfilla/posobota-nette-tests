<?php declare(strict_types = 1);

namespace App\Presenters;

use App\Presenters\Components\Order\OrderComponent;
use Nette;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{

	use OrderComponent;

}
