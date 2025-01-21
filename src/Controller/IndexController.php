<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
	public function __construct(
		private readonly LoggerInterface $logger,
	)
	{
	}

	#[Route('/', name: 'homepage')]
	public function homepageAction(): Response
	{
		$this->logger->info('info message', ['additionalContext' => 'info context']);
		$this->logger->warning('warning message', ['additionalContext' => 'warning context']);
		$this->logger->critical('critical message', ['additionalContext' => 'critical context']);

		return $this->render('Frontend/homepage.html.twig');
	}
}
