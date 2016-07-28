<?php

namespace RpgmsBundle\Form\Type\DiceRoller;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use RpgmsBundle\Form\Type\DiceRoller\DiceType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RollSetType extends AbstractType
{

    private $diceBag;

    public function __construction($worldId)
    {
        $this->worldId = $worldId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $diceType = new DiceType($this->workdId);
        $builder
                ->add('dice', CollectionType::class, array(
                    'entry_type' =>  $diceType
                ))
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'RpgmsBundle\Entity\RollSet',
        ));
    }
}
