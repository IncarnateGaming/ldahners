<?php

namespace App\Form;

use App\Entity\Series;
use App\Entity\SeriesReview;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeriesReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Hyperlink')
            ->add('Review')
            ->add('Series', EntityType::class,[
                'class'=>Series::class,
                'choice_label'=>'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SeriesReview::class,
        ]);
    }
}
