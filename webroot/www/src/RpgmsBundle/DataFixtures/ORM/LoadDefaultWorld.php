<?php

namespace RpgmsBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use RpgmsBundle\Entity\World;
use RpgmsBundle\Entity\User;

class LoadDefaultWorld extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;
    
    public function load(ObjectManager $manager)
    {
        $doctrine = $this->container->get('doctrine');
       
        // Find admin user
        $user = $doctrine->getRepository('RpgmsBundle\Entity\User')->findOneBy(array('username' => 'admin'));
        $die = $doctrine->getRepository('RpgmsBundle\Entity\Dice')->findAll();
        
        $world = new World();
        $world->setGm($user);
        $world->setName('testWorld');
        $world->setDescription('sample world for testing');
        $world->setDate(new \DateTime('NOW'));
        
        foreach($die as $dice){
            $world->addDice($dice);
        }
        $manager->persist($world);
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
        return 3;
    }
}