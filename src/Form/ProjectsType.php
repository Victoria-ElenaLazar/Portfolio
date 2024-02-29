<?php

namespace App\Form;

use App\Entity\Projects;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;

class ProjectsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('video', FileType::class,[
                'label' => 'Project demo (video)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '100M',
                        'mimeTypes' => [
                            'video/mp4',
                            'video/quicktime',
                            'video/x-msvideo',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid video file',
                    ]),
                    new LessThanOrEqual([
                        'value' => '100M',
                        'message' => 'The file is too large. Maximum size allowed is {{ limit }}',
                    ]),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
