<?php

namespace RpgmsBundle\Form\Type\DiceRoller;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use RpgmsBundle\Form\Type\DiceRoller\RollsetType;
use RpgmsBundle\Form\Type\DiceRoller\RollType;
use RpgmsBundle\Form\Type\DiceRoller\DiceType;

use RpgmsBundle\Entity\RollSet;
use RpgmsBundle\Entity\Roll;
use RpgmsBundle\Entity\Dice;

class RollSetType extends AbstractType
{

    /**
     * Roll Set will generate any number of rolls
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('action');
        $builder->add('bonus');
        $builder->add('penalty');
        $builder
                ->add('roll', CollectionType::class, array(
                    'entry_type' => RollType::class,
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'label' => false,
                )
        );
        
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'RpgmsBundle\Entity\RollSet',
            'world_id' => 1
        ));
    }
}
