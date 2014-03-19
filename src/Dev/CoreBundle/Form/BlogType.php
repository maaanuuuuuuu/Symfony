<?php

namespace Dev\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Dev\CoreBundle\Entity\Blog;

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
                        'placeholder' => 'Title',
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
                    )
                )
            );
    }

    public function getName()
    {
        return 'blogPost';
    }
}
