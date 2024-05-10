<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AvailabilityRepository; 

class CreateCarController extends AbstractController
{
    #[Route('/create', name: 'app_create_car')]
    public function index(AvailabilityRepository $repository): Response
    {

       

        return $this->render('create_car/index.html.twig', [
            'controller_name' => 'CreateCarController',
        ]);
    }

    
}
