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

class DiceType extends AbstractType
{

    public function __construction($worldId = null)
    {
        $this->worldId = $worldId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('Dice', EntityType::class, array(
                    'class' => 'RpgmsBundle:Dice',
                    'query_builder' => function (EntityRepository $er) {
                      return $er->createQueryBuilder('d');
                    },
                    'choice_label' => 'dice'
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RpgmsBundle\Entity\Dice',
            'world_id' => 1
        ));
    }

}
