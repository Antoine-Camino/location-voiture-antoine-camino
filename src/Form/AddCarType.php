<?php

namespace App\Form;

use App\Entity\Availability;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Import de EntityType

class AddCarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Price')
            ->add('StartDate')
            ->add('EndDate')
            ->add('Available')
            ->add('LinkCar', EntityType::class, [ 
                'class' => 'App\Entity\Car', 
                'choice_label' => function ($car) { 
                    return $car->getBrand() . ' ' . $car->getModel(); 
                },
                'placeholder' => 'Sélectionnez une voiture', 
                'required' => true, 
            ])
            ->add('save', SubmitType::class, ['label' => 'Envoyer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Availability::class,
        ]);
    }
}
