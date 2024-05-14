<?php

namespace App\Form;

use App\Entity\Availability;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ChooseDateandPriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        
        $builder
        ->add('Price', RangeType::class, [
            'label' => 'Prix',
            'attr' => [
                'min' => 0, 
                'max' => 300, 
                'step' => 10, 
                
            ]
        ])
        ->add('StartDate', null, [
            'label' => 'Date de début'
        ])
        ->add('EndDate', null, [
            'label' => 'Date de fin'
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Rechercher'
        ]);
            // ->add('Available')
            // ->add('LinkCar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Availability::class,
        ]);
    }
}
