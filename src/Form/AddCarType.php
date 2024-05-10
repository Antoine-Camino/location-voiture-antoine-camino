<?php

namespace App\Form;

use App\Entity\Availability;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddCarType extends AbstractType
{
    public function buildForm  (FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Price')
            ->add('StartDate')
            ->add('EndDate')
            ->add('Available')
            ->add('LinkCar')
        ;
    }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Availability::class,
        ]);

    }
}
