<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HealthcheckController extends AbstractController
{
    #[Route('/healthcheck', name: 'app_healthcheck')]
    public function index(): Response
    {
        return $this->render('healthcheck/index.html.twig', [
            'controller_name' => 'HealthcheckController',
        ]);
    }
}
