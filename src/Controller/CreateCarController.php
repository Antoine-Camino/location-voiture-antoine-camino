<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Repository\AvailabilityRepository; 
use App\Repository\CarRepository; 
use App\Entity\Availability;

class CreateCarController extends AbstractController
{
    #[Route('/create', name: 'app_create_car')]
    public function index(AvailabilityRepository $repository, CarRepository $carRepository): Response
    {
        $car= new Car();
        

        return $this->render('create_car/index.html.twig', [
            'controller_name' => 'CreateCarController',
        ]);
    }

    
}
