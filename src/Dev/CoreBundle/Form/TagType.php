<?php

namespace Dev\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Dev\CoreBundle\Document\Tag;

class TagType extends AbstractType
{
        
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                'hidden',
                array(
                    'required'  => true,
                    'label'  => ' ',
                    'attr' => array(
                        'class' => 'form-control titleTagInput',
                    )
                )
            );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dev\CoreBundle\Document\Tag',
        ));
    }

    public function getName()
    {
        return 'tagPost';
    }
}
