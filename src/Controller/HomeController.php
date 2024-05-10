<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AvailabilityRepository; 
use App\Repository\CarRepository; 

class HomeController extends AbstractController
{
    #[Route("/", name:"home", methods: ['GET'] )] 
    public function home(AvailabilityRepository $repository, CarRepository $carRepository): Response
    {
        
        $dispos = $repository->findAll();
        $cars = $carRepository->findAll();

        return $this->render('home/index.html.twig', [
            'dispos' => $dispos,
            'cars' => $cars
        ]);
    }
}

