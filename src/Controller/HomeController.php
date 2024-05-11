<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AvailabilityRepository; 
use App\Repository\CarRepository; 

use App\Form\ChooseDateandPriceType;

use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route("/", name:"home", methods: ['GET'] )] 
    public function home(Request $request,AvailabilityRepository $repository, CarRepository $carRepository): Response
    {
        
        $dispos = $repository->findAll();
        $cars = $carRepository->findAll();

        // Création d'une instance de ton formulaire
        $form = $this->createForm(ChooseDateandPriceType::class);
    
        // Gestion de la soumission du formulaire
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement du formulaire ici (par exemple, enregistrement en base de données)
        }

        return $this->render('home/index.html.twig', [
            'dispos' => $dispos,
            'cars' => $cars,
            'ChooseDateandPriceType' => $form->createView()
        ]);
    }




    // #[Route('/voiture', name: 'app_show_all_car')]
    // public function show(AvailabilityRepository $repository, CarRepository $carRepository ): Response
    // {
    //     $dispos = $repository->findAll();
    //     $cars = $carRepository->findAll();

    //     return $this->render('show_all_car/index.html.twig', [
    //         'controller_name' => 'ShowAllCarController',
    //         'dispos' => $dispos,
    //         'cars' => $cars
    //     ]);
    // }


}

