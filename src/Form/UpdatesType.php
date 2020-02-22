<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Updates;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdatesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('book', EntityType::class,[
                'class'=>Book::class,
                'choice_label'=>'name',
                'required'=>false,
            ])
            ->add('description',TextType::class,[
                'label'=>'Description',
            ])
            ->add('closeDescription', TextType::class,[
                'label'=>'Closing Description',
                'required'=>false,
            ])
            ->add('closeLink', UrlType::class,[
                'label'=>'Closing Hyperlink',
                'required'=>false,
            ])
            ->add('priority',null,[
                'label'=>'Priority of Update',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Updates::class,
        ]);
    }
}
