<?php

namespace RpgmsBundle\Form\Type\DiceRoller;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use RpgmsBundle\Form\Type\DiceRoller\RollsetType;
use RpgmsBundle\Form\Type\DiceRoller\RollType;
use RpgmsBundle\Form\Type\DiceRoller\DiceType;

use RpgmsBundle\Entity\RollSet;
use RpgmsBundle\Entity\Roll;
use RpgmsBundle\Entity\Dice;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RollSetType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $diceType = new DiceType($this->worldId);
        $builder
                ->add('roll', CollectionType::class, array(
                    'entry_type' =>  RollType::class,
                    'required' => false,
                    'multiple' => true,
                ))
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'RpgmsBundle\Entity\RollSet',
            'world_id' => 1
        ));
    }
}
