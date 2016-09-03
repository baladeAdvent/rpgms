<?php

namespace RpgmsBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use RpgmsBundle\Entity\RollSet;
use RpgmsBundle\Entity\Roll;
use RpgmsBundle\Entity\Dice;

class LoadTestRollSet extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;
    
    public function load(ObjectManager $manager)
    {
        $doctrine = $this->container->get('doctrine');
      
        $world = $doctrine->getRepository('RpgmsBundle\Entity\World')->findAll();
        $playerCharacter = $doctrine->getRepository('RpgmsBundle\Entity\PlayerCharacter')->findAll();
        /*
         * Create a new rollset
         */
       $rollSet = new RollSet();
       $rollSet->setAction('testing action input...');
       $rollSet->setbonus(5);
       $rollSet->setPenalty(5);
       $rollSet->setDate(new \DateTime('NOW'));
       $rollSet->setWorld($world[0]);
       $rollSet->setResult(10);
       $rollSet->setPlayerCharacter($playerCharacter[0]);
       
       /*
        * Create a new Roll to go into the rollset
        */
       $roll = new Roll();
       $roll->setResult(5);
       
       $rollSet->addRoll($roll);
       /*
        * Retrieve Dice for test Rollset
        */
        $die = $doctrine->getRepository('RpgmsBundle\Entity\Dice')->findAll();
        $dice = $die[0];
       
        $roll->setDice($dice);
        $roll->setRollSet($rollSet);
        
        $manager->persist($rollSet);
        $manager->persist($roll);
        
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
        return 5;
    }
    
}