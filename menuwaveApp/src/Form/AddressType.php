<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Address', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'Street address'
                    ),
                    'label' => false
                )
            )
            ->add('zipCode', NumberType::class,array(
                    'attr' => array(
                        'placeholder' => 'Zip code',
                    ),
                    'label' => false
                )
            )
            ->add('city', TextType::class,array(
                    'attr' => array(
                        'placeholder' => 'City',
                    ),
                    'label' => false
                )
            )
            ->add('country', CountryType::class, array(
                    'attr' => array(
                        'placeholder' => 'Country',
                    ),
                'label' => false
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
