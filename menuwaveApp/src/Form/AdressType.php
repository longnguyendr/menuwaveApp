<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Address', ['placeholder' => 'Street address', 'label' => false])
            ->add('zipCode', ['placeholder' => 'Zip code', 'label' => false])
            ->add('city', ['placeholder' => 'City', 'label' => false])
            ->add('country', CountryType::class, ['placeholder' => 'Country', 'label' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
