<?php

namespace App\Form;

use App\Entity\Availability;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Validator\Constraints\Regex;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ChooseDateandPriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        
        $builder
        ->add('Price', TextType::class, [
            'label' => 'Prix maximum de location',
            'attr' => [
                'placeholder' => 'Entrez le prix maximum'
            ],
            'required' => false, 
            'constraints' => [
                new Assert\Regex([
                    'pattern' => '/^\d+(\.\d{1,2})?$/', 
                    'message' => 'Veuillez entrer un prix valide.'
                ]),
                new Assert\GreaterThanOrEqual([
                    'value' => 0,
                    'message' => 'Le prix maximum doit être supérieur ou égal à zéro.'
                ])
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
