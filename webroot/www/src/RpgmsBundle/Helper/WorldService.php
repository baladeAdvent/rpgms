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

    public function getDiceBag($worldId)
    {
        $world = $this->em->getRepository('RpgmsBundle:World')->findOneById($worldId);
        return $world->getDiceBag()->toArray();
    }

}
