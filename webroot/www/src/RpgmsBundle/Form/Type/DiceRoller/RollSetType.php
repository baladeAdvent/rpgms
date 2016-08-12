<?php

namespace RpgmsBundle\Form\Type\DiceRoller;

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
use RpgmsBundle\Form\Type\DiceRoller\RollsetType;
use RpgmsBundle\Form\Type\DiceRoller\RollType;
use RpgmsBundle\Form\Type\DiceRoller\DiceType;
use RpgmsBundle\Entity\RollSet;
use RpgmsBundle\Entity\Roll;
use RpgmsBundle\Entity\Dice;
use RpgmsBundle\Form\DataTransformer\WorldToIdTransformer;

class RollSetType extends AbstractType
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
        $builder->add('action', TextType::class, array(
            'required' => true,
            'trim' => true,
            'attr' => ['placeholder' => 'Insert Roll Action Text...'],
        ));
        $builder->add('bonus', NumberType::class, array(
            'required' => false,
            'empty_data' => '0',
        ));
        $builder->add('penalty', NumberType::class, array(
            'required' => false,
            'empty_data' => '0',
        ));
        $builder
                ->add('rolls', CollectionType::class, array(
                    'entry_type' => RollType::class,
                    'entry_options' => array(
                        'world' => $options['world']->getId()
                    ),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'label' => false,
                    'required' => true,
                        )
        );
        $builder->add('world', HiddenType::class, array(
            'data' => $options['world']->getId(),
        ));
        $builder->add('save', SubmitType::class, array(
            'label' => 'Submit',
            'attr' => array('class' => 'btn btn-default btn-block')
        ));
        
        // More than meets the eye
        $builder->get('world')->addModelTransformer(new WorldToIdTransformer($this->manager));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RpgmsBundle\Entity\RollSet',
            'world' => null
        ));
    }

}
