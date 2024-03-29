<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null,[
                'label' => 'Nom'
            ])
            ->add('description')
            ->add('price')
          //  ->add('nbViews')
           // ->add('createdAt')
            //->add('updatedAt')
            ->add('isPublished')
            ->add('imageName')
            //->add('slug')
           // ->add('tags')
            ->add('categorie')
           //->add('submit', SubmitType::class) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
