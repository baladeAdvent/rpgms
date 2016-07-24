<?php

namespace RpgmsBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use RpgmsBundle\Entity\User;

class LoadDefaultUser extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;
    
    public function load(ObjectManager $manager)
    {
        // Get userManager
        $userManager = $this->container->get('fos_user.user_manager');
        
        // Create default user
        $user = $userManager->createUser();
        $user->setUsername('admin');
        $user->setFirstName('David');
        $user->setLastName('Perez');
        $user->setEmail('dadanperez@gmail.com');
        $user->setPlainPassword('123456');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_ADMIN'));
        
        $userManager->updateUser($user, true);
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}