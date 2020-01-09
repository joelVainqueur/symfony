<?php

namespace App\Form;

use App\Entity\AnnonceSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class AnnonceSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'tapez ce que vous cherchez'
                ]
                ])

            ->add('minPrice', MoneyType::class,[
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholder'=>"Prix minimum"
                ]
            ])
            ->add('maxPrice', MoneyType::class,[
                'required'=>false, //le champ n'est paas obligatoire
                'label'=>false,
                'attr'=>[
                    'placeholder'=>'Prix maximum'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AnnonceSearch::class,
            'method'=>'get',
            'csrf_protection'=>false //desactive la protection csrf
        ]);
    }
    //fonction qui permet de retourner une chaine vide pour les prefixe dans la base de recherche
    public function getBlockPrefix(){
        return'';
    }
}
