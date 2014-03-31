<?php

namespace Dev\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Dev\CoreBundle\Document\Blog;

class BlogType extends AbstractType
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
                        'class' => 'form-control titleBlogInput',
                    )
                )
            )
            ->add('text',
                'textarea', 
                array(
                    'required'  => true,
                    'label'  => ' ',
                    'attr' => array(
                        'placeholder' => 'Post ...',
                        'class' => 'form-control',
                    )
                )
            );
    }

    public function getName()
    {
        return 'blogPost';
    }
}
