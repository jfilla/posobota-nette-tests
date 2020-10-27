<?php declare(strict_types = 1);

namespace App\Models\Doctrine;

trait InjectEntityManager
{

	private EntityManager $entityManager;

	public function injectEntityManager(EntityManager $entityManager): void
	{
		$this->entityManager = $entityManager;
	}

}
