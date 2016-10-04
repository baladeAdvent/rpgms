<?php

namespace RpgmsBundle\Form\Type\BackEnd;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use RpgmsBundle\Entity\PlayerCharacter;
use RpgmsBundle\Entity\Dice;
use RpgmsBundle\Entity\System;
use RpgmsBundle\Form\DataTransformer\UserToIdTransformer;

class PlayerCharacterType extends AbstractType
{

    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Roll Set will generate any number of rolls
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder->add('name', TextType::class, array(
            'required' => true,
            'trim' => true,
            'attr' => array('class' => 'form-control'),
        ));
        $builder->add('race', TextType::class, array(
            'required' => true,
            'trim' => true,
            'attr' => array('class' => 'form-control'),
        ));
        $builder->add('description', TextType::class, array(
            'required' => true,
            'trim' => true,
            'attr' => array('class' => 'form-control'),
        ));
        $builder->add('user', HiddenType::class, array(
            'data' => $options['user']->getId(),
        ));
        
        $builder->add('save', SubmitType::class, array(
            'label' => 'Submit',
            'attr' => array('class' => 'btn btn-default btn-block')
        ));
        
        $builder->get('user')->addModelTransformer(new UserToIdTransformer($this->manager));
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'allow_extra_fields' => false,
            'data_class' => 'RpgmsBundle\Entity\PlayerCharacter',
            'user' => null
        ));
    }

}
