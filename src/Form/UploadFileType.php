<?php

namespace App\Form;

use App\Entity\UploadFile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class UploadFileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name1', TextType::class,[
                'label'=>'Name'
            ])
            ->add('description1',TextareaType::class,[
                'label'=>'Description',
                'required'=>false
            ])
            ->add('order1',IntegerType::class,[
                'label'=>'Display Order'
            ])
            ->add('fileFile',VichFileType::class,[
                'label'=>'File Upload',
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UploadFile::class,
        ]);
    }
}
