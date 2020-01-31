<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Series;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('OrderInSeries')
            ->add('Description')
            ->add('Image')
            ->add('AmazonLink')
            ->add('Series',EntityType::class,[
                'class'=>Series::class,
                'choice_label'=>'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
