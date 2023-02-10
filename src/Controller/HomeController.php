<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CarRepository $carRepository): Response
    {
        $headerCar = $carRepository->findBy(["isHeader" => true]);
        $allCars = $carRepository->findAll();
    
        return $this->render('home/base.html.twig', [
            'header' => $headerCar,
            'allCars' => $allCars
        ]);
    }
}
