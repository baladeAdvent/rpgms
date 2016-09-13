<?php

namespace RpgmsBundle\Helper;

/**
 * World service to retrieve specific information about the current world
 * 
 *  Methods:
 * getWorldId():    Get id for current active world
 * getDiceBag():   Get diceBag for current world
 */
class WorldService
{

    private $container;
    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function getDice($worldId)
    {
        $world = $this->em->getRepository('RpgmsBundle:World')->findOneById($worldId);
        return $world->getDice();
    }

    public function getWorldById($Id)
    {
        $world = $this->em->getRepository('RpgmsBundle:World')->findOneById($Id);
        return $world;
    }
    
    public function getWorldByName($name)
    {
        $world = $this->em->getRepository('RpgmsBundle:World')->findOneByName($name);
        return $world;
    }
    
    /**
     *  This needs to be moved somewhere else and handle getting the current active "character" in some other way...
     */
    public function getPlayerByName($name)
    {
        $playerCharacter = $this->em->getRepository('RpgmsBundle:PlayerCharacter')->findOneByName($name);
        return $playerCharacter;
    }

}
