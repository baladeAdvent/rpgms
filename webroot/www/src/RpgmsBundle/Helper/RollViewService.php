<?php

namespace RpgmsBundle\Helper;

/*
 * Reuseable dice service for taking in a request to rng on a
 * specified die and return the result for various uses
 */

class RollViewService
{

    private $container;
    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    /**
     *  Methods:
     *  GetRolls: retrieve last 15 roll sets for world from db
     */
}
