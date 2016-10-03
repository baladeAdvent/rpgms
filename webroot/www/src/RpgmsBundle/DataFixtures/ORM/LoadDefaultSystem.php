<?php

namespace RpgmsBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use RpgmsBundle\Entity\System;
use RpgmsBundle\Entity\SystemAttribute;

class LoadDefaultSystem extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
   
    /**
     * @var ContainerInterface
     */
    private $container;
    
    public function load(ObjectManager $manager)
    {
        $doctrine = $this->container->get('doctrine');
        
        // Get test World
        $world = $doctrine->getRepository('RpgmsBundle\Entity\World')->findOneBy(array('name' => 'testWorld'));
        
        $die = $doctrine->getRepository('RpgmsBundle\Entity\Dice')->findAll();
        
        $system = new System();
        
        $hp = new SystemAttribute();
        $hp->setName('Hit Points');
        $hp->setType('health');
        $hp->setSort(1);
        $hp->setSystem($system);
        $hp->setDice($die[2]);
        
        $str = new SystemAttribute();
        $str->setName('Strength');
        $str->setType('stat');
        $str->setSort(2);
        $str->setSystem($system);
        $str->setDice($die[6]);
        
        $int = new SystemAttribute();
        $int->setName('Intelligence');
        $int->setType('stat');
        $int->setSort(3);
        $int->setSystem($system);
        $int->setDice($die[6]);
        
        $dex = new SystemAttribute();
        $dex->setName('Dexterity');
        $dex->setType('stat');
        $dex->setSort(4);
        $dex->setSystem($system);
        $dex->setDice($die[6]);
        
        $system->setName("D20");
        $system->addWorld($world);
        $system->addSystemAttribute($hp);
        $system->addSystemAttribute($str);
        $system->addSystemAttribute($int);
        $system->addSystemAttribute($dex);
        
        $world->setSystem($system);
        
        $manager->persist($system);
        $manager->persist($hp);
        $manager->persist($str);
        $manager->persist($int);
        $manager->persist($dex);
        //$manager->persist($world);
        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 6;
    } 
}