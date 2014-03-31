<?php

namespace Dev\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Dev\CoreBundle\Document\Blog;

class ProjectType extends AbstractType
{
        
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',
                'text', 
                array(
                    'required'  => true,
                    'label'  => ' ',
                    'attr' => array(
                        'placeholder' => 'Titre',
                        'class' => 'form-control',
                    )
                )
            )
            ->add('indexRouteName',
                'text', 
                array(
                    'required'  => true,
                    'label'  => ' ',
                    'attr' => array(
                        'placeholder' => 'Route Symfony',
                        'class' => 'form-control',
                    )
                )
            )
            ->add('googleDocLink',
                'url', 
                array(
                    'required'  => false,
                    'label'  => ' ',
                    'attr' => array(
                        'placeholder' => 'Lien Google Drive',
                        'class' => 'form-control',
                    )
                )
            ) 
            ->add('trelloBoardLink',
                'url', 
                array(
                    'required'  => false,
                    'label'  => ' ',
                    'attr' => array(
                        'placeholder' => 'Lien du board Trello',
                        'class' => 'form-control',
                    )
                )
            )
            ->add('text',
                'textarea', 
                array(
                    'required'  => true,
                    'label'  => ' ',
                    'attr' => array(
                        'placeholder' => 'Description du projet',
                        'class' => 'form-control',
                    )
                )
            );
    }

    public function getName()
    {
        return 'projectPost';
    }
}
