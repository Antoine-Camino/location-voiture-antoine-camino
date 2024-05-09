<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AvailabilityRepository; 

class HomeController extends AbstractController
{
    #[Route("/", name:"home", methods: ['GET'] )] 
    public function home(AvailabilityRepository $repository): Response
    {
        // Récupérez les disponibilités à partir du dépôt
        $dispos = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'dispos' => $dispos
        ]);
    }
}

