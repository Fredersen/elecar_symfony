<?php

namespace App\Controller;

use App\Repository\BrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarRepository;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CarRepository $carRepository, BrandRepository $brandRepository): Response
    {
        $headerCar = $carRepository->findBy(["isHeader" => true]);
        $allCars = $carRepository->findAll();
        $brands = $brandRepository->findAll();

        return $this->render('home/base.html.twig', [
            'header' => $headerCar,
            'allCars' => $allCars,
            'brands' => $brands,
            'filteredCars' => $allCars,
        ]);
    }

    #[Route('/filter', name: 'app_filter', methods: ['GET'])]
    public function filter(CarRepository $carRepository, BrandRepository $brandRepository, SerializerInterface $serializer): Response
    {
        $filteredCars = $carRepository->findAll();

        if(isset($_GET['brand']) && !empty($_GET['brand'])) {
            $brand = $brandRepository->findOneBy(["name" => $_GET['brand']]);
            $filteredCars = $carRepository->findBy(["brand" => $brand]);
        }

        $jsonFilteredCars = $serializer->serialize($filteredCars, 'json', ['groups' => 'car:read']);

        $response = new Response($jsonFilteredCars, 200, ['Content-Type' => 'application/json']);

        return $response;
    }
}
