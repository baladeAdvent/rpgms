<?php

namespace RpgmsBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use RpgmsBundle\Entity\PlayerCharacter;
use RpgmsBundle\Entity\World;
use RpgmsBundle\Entity\User;

class LoadDefaultPlayerCharacter extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        ladybug_dump($world);
        
        // Get test User
        $user = $doctrine->getRepository('RpgmsBundle\Entity\User')->findOneBy(array('username' => 'admin'));
        ladybug_dump($user);
        
        $playerCharacter = new PlayerCharacter();
        $playerCharacter->setName('testCharacter');
        $playerCharacter->setRace('testRace');
        $playerCharacter->setDescription('testing character description');
        $playerCharacter->setWorld($world);
        $playerCharacter->setUser($user);
        
        $manager->persist($playerCharacter);
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
        return 4;
    }
}