<?php

namespace App\Form;

use App\Entity\Availability;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ChooseDateandPriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Price')
            ->add('StartDate')
            ->add('EndDate')
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
