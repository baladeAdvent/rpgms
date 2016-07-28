<?php

namespace RpgmsBundle\Form\Type\DiceRoller;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RollSetType extends AbstractType
{

    private $diceBag;

    public function __construction()
    {
        
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('Dice')
                ->add('Quantity')
                ->add('Roll', SubmitType::class)
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            
        ));
    }

    public function getName() {
        return 'Dice Roller';
    }
}
