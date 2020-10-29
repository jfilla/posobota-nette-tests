<?php declare (strict_types = 1);

namespace App\Models;

trait InjectGetJoke
{

	protected GetJoke $getJoke;

	public function injectGetJoke(GetJoke $getJoke): void
	{
		$this->getJoke = $getJoke;
	}

}
