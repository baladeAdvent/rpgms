<?php

namespace RpgmsBundle\Form\Type\DiceRoller;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DiceType extends AbstractType
{

    public function __construction($worldId)
    {
        $this->worldId = $worldId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('Dice', EntityType::class, array(
                    'class' => 'RpgmsBundle:Dice',
                    'query_builder' => function (EntityRepository $er) {
                      return $er->createQuery(
                              'SELECT dice_id FROM world_dice WHERE world_id=1'
                              )->getResult();
                    },
                    'choice_label' => 'dice'
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RpgmsBundle\Entity\Dice',
        ));
    }

}
