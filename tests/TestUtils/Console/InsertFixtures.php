<?php declare(strict_types = 1);

namespace AppTests\TestUtils\Console;

use App\Models\Doctrine\InjectEntityManager;
use AppTests\TestUtils\Fixtures\InjectItemFixtures;
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
	use InjectItemFixtures;

	public const NAME = 'tests:insert-fixtures';

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
		$this->itemFixtures->createItemA();
		$this->itemFixtures->createItemB();
		$this->entityManager->flush();
		return 0;
	}

}
