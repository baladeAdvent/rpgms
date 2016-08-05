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

class RollType extends AbstractType
{

    /**
     * One roll set will have any number of Rolls which will contain 1 dice
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        ladybug_dump($options['world_id']);
        $worldId = $options['world_id'];
        $builder->add('dice', EntityType::class, array(
                    'class' => 'RpgmsBundle:Dice',
                    'query_builder' => function (EntityRepository $er)  use ($worldId){
                        global $options;
                        return $er->createQueryBuilder('d')
                                ->where(':world MEMBER OF d.world')
                                ->orderBy('d.name', 'DESC')
                                ->setParameter('world', $worldId);
                    },
                    'expanded' => true,
                    'multiple' => false,
                    'required' => true,
                    'label' => false,
                ))
        ;

        
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'RpgmsBundle\Entity\Roll',
            'world_id' => 3
        ));
    }
}
