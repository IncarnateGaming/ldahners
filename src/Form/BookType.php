<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Series;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('OrderInSeries')
            ->add('Description')
            ->add('imageFile',VichImageType::class,[
                'required'=>false,
            ])
            ->add('AmazonLink')
            ->add('Series',EntityType::class,[
                'class'=>Series::class,
                'choice_label'=>'name',
            ])
            ->add('Excerpt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
