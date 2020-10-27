<?php declare(strict_types = 1);

namespace App\Console;

use App\Entities\Item;
use App\Models\Doctrine\InjectEntityManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Wavevision\DIServiceAnnotation\DIService;

/**
 * @DIService
 */
class InsertFixtures extends Command
{

	use InjectEntityManager;

	public const NAME = 'app:insert-fixtures';

	/**
	 * @phpcsSuppress SlevomatCodingStandard.TypeHints.PropertyTypeHint
	 * @var string
	 */
	protected static $defaultName = self::NAME;

	protected function configure(): void
	{
		$this->setDescription('Insert fixtures');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$this->item(Item::ID_A, '42.03');
		$this->item(Item::ID_B, '3.14');
		$this->entityManager->flush();
		return 0;
	}

	private function item(string $id, string $price): void
	{
		$item = new Item();
		$item
			->setId($id)
			->setPrice($price);
		$this->entityManager->persist($item);
	}

}
