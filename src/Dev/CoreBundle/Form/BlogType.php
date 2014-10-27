<?php

namespace Dev\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Dev\CoreBundle\Document\Blog;

class BlogType extends AbstractType
{
        
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
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
            ->add(
                'text',
                'textarea',
                array(
                    'required'  => true,
                    'label'  => ' ',
                    'attr' => array(
                        'placeholder' => 'Post ...',
                        'class' => 'form-control',
                    )
                )
            )
            ->add(
                'tags',
                'collection',
                array(
                    'type' => new TagType(),
                    'label'  => ' ',
                    'allow_add' => true,
                    'by_reference' => false, //permet d'appeler setTags()
                )
            );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dev\CoreBundle\Document\Blog',
        ));
    }

    public function getName()
    {
        return 'blogPost';
    }
}
