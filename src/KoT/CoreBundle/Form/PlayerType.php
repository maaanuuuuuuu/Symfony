<?php

namespace KoT\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use KoT\CoreBundle\Document\Player;

class PlayerType extends AbstractType
{
        
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('playerName',
                'text', 
                array(
                    'required'  => true,
                    'label'  => ' ',
                    'attr' => array(
                        'placeholder' => 'Nom',
                        'class' => 'form-control',
                    )
                )
            );
    }

    public function getName()
    {
        return 'PlayerPost';
    }
}
