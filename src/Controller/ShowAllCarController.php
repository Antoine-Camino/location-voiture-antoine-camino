<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AvailabilityRepository; 
use App\Repository\CarRepository; 
use App\Entity\Availability;
use App\Form\AddCarType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;



class ShowAllCarController extends AbstractController
{
    #[Route('/voiture', name: 'app_show_all_car')]
    public function show(AvailabilityRepository $repository, CarRepository $carRepository ): Response
    {
        $dispos = $repository->findAll();
        $cars = $carRepository->findAll();
        
        

        return $this->render('show_all_car/index.html.twig', [
            'controller_name' => 'ShowAllCarController',
            'dispos' => $dispos,
            'cars' => $cars
            
        ]);
    }

    #[Route('/create/{id}/edit', name: 'car.edit')]
    public function edit(Request $request, $id, AvailabilityRepository $availabilityRepository, EntityManagerInterface $em): Response
    {
        
        $dispo = $availabilityRepository->find($id);

     
        
        $form = $this->createForm(AddCarType::class, $dispo);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em->flush();
            return $this->redirectToRoute('app_show_all_car');
        }

    
        return $this->render('show_all_car/edit.html.twig', [
            'dispo'=>$dispo,
            'form' => $form->createView()
        ]);
    }
}
