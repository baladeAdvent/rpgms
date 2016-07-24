<?php

namespace RpgmsBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use RpgmsBundle\Entity\Dice;

class LoadDefaultDice extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // D4
        $dice = new Dice();
        $dice->setName('D4');
        $dice->setMinRange(1);
        $dice->setMaxRange(4);
        $manager->persist($dice);

        // D6
        $dice = new Dice();
        $dice->setName('D6');
        $dice->setMinRange(1);
        $dice->setMaxRange(6);
        $manager->persist($dice);

        // D8
        $dice = new Dice();
        $dice->setName('D8');
        $dice->setMinRange(1);
        $dice->setMaxRange(8);
        $manager->persist($dice);

        // D10
        $dice = new Dice();
        $dice->setName('D10');
        $dice->setMinRange(1);
        $dice->setMaxRange(10);
        $manager->persist($dice);

        // D12
        $dice = new Dice();
        $dice->setName('D12');
        $dice->setMinRange(1);
        $dice->setMaxRange(12);
        $manager->persist($dice);

        // D20
        $dice = new Dice();
        $dice->setName('D20');
        $dice->setMinRange(1);
        $dice->setMaxRange(20);
        $manager->persist($dice);

        // D100
        $dice = new Dice();
        $dice->setName('D100');
        $dice->setMinRange(1);
        $dice->setMaxRange(100);
        $manager->persist($dice);
        
        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
    
}