<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AvailabilityRepository; 
use App\Repository\CarRepository; 
use App\Entity\Availability;
use App\Entity\Car;
use App\Form\EditCarType;
use App\Form\AddCarType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;



class ShowAllCarController extends AbstractController
{

    //ajout de la route d'affichage des disponibilitées------------
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

    //ajout de la route edit disponibilité------------

    #[Route('/create/{id}/edit', name: 'car.edit')]
    public function edit(Request $request, $id, AvailabilityRepository $availabilityRepository, EntityManagerInterface $em): Response
    {
        
        $dispo = $availabilityRepository->find($id);

     
        
        $form = $this->createForm(EditCarType::class, $dispo);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $em->flush();
            // $this->addFlash('success','les informations ont bien été changées 😋');
            return $this->redirectToRoute('app_show_all_car');
        }

    
        return $this->render('show_all_car/edit.html.twig', [
            'dispo'=>$dispo,
            'form' => $form->createView()
        ]);
    }

    //ajout de la route creation voiture------------
    #[Route('/create/add', name: 'car.add')]
public function create(Request $request,CarRepository $carRepository, EntityManagerInterface $em)
{
    $car = new Car(); 
    $form = $this->createForm(AddCarType::class, $car);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($car);
        $em->flush();
        return $this->redirectToRoute('app_show_all_car');
    }

    return $this->render('show_all_car/add.html.twig', [
        'car' => $car, 
        'form' => $form->createView()
    ]);
}
}
