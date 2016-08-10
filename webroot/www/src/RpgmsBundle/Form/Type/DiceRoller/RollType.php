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
    private $world;

    /**
     * One roll set will have any number of Rolls which will contain 1 dice
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $worldId = $options['world']->getId();
        $builder->add('dices', EntityType::class, array(
                    'class' => 'RpgmsBundle:Dice',
                    'query_builder' => function (EntityRepository $er) use ($worldId){
                        return $er->createQueryBuilder('d')
                                ->where(':world MEMBER OF d.worlds')
                                ->setParameter('world', $worldId)
                                ->addOrderBy('d.maxRange', 'ASC');
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
            'world' => null,
            'inherit_data' => true,
        ));
    }
}
