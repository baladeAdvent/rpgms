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
use RpgmsBundle\Entity\World;
use RpgmsBundle\Entity\Dice;
use RpgmsBundle\Entity\System;
use RpgmsBundle\Form\DataTransformer\UserToIdTransformer;

class WorldType extends AbstractType
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
        $builder->add('description', TextType::class, array(
            'required' => true,
            'trim' => true,
            'attr' => array('class' => 'form-control'),
        ));
        $builder->add('dice', EntityType::class, array(
            'class' => 'RpgmsBundle:Dice',
            'query_builder' => function(EntityRepository $er){
                return $er->createQueryBuilder('d')
                        ->addOrderBy('d.id', 'ASC');
            },
            'expanded' => true,
            'multiple' => true,
            'required' => true,
            'label' => false,
        ));
        $builder->add('system', EntityType::class, array(
            'class' => 'RpgmsBundle:System',
            'query_builder' => function(EntityRepository $er){
                return $er->createQueryBuilder('s')
                        ->addOrderBy('s.id', 'ASC');
            },
            'expanded' => false,
            'multiple' => false,
            'required' => true,
            'label' => false,
            'attr' => array('class' => 'form-control'),
        ));
        $builder->add('gm', HiddenType::class, array(
            'data' => $options['user']->getId(),
        ));
        
        $builder->add('save', SubmitType::class, array(
            'label' => 'Submit',
            'attr' => array('class' => 'btn btn-default btn-block')
        ));
        
        $builder->get('gm')->addModelTransformer(new UserToIdTransformer($this->manager));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'allow_extra_fields' => false,
            'data_class' => 'RpgmsBundle\Entity\World',
            'user' => null
        ));
    }

}
