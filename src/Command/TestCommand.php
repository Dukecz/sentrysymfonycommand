<?php

declare(strict_types=1);

namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
	/**
	 * @inheritDoc
	 */
	protected static $defaultName = 'app:test';

	public function __construct(private readonly LoggerInterface $logger)
	{
		parent::__construct();
	}

	/**
	 * @inheritDoc
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$this->logger->info('info message', ['additionalContext' => 'info context']);
		$this->logger->warning('warning message', ['additionalContext' => 'warning context']);
		$this->logger->critical('critical message', ['additionalContext' => 'critical context']);

		return 0;
	}
}
