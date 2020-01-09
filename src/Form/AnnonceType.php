<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


use Vich\UploaderBundle\Form\Type\VichFileType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label'=>'Titre'
            ])
            ->add('description', null,[
                'label'=>"Description de l'annonce"
            ])
            ->add('price', null, [
                'label'=>'Prix (Optionnel)'
            ])
        
            ->add('photo', VichFileType::class, ['data_class'=>null, 'required'=>false])
            ->add('updatedAt', DateType::class, array('label'=>' Date', 'widget'=>'single_text'))
            ;
            
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
