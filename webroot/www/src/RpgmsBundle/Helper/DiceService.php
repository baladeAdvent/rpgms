<?php

namespace RpgmsBundle\Helper;

/*
 * Reuseable dice service for taking in a request to rng on a
 * specified die and return the result for various uses
 */

class DiceService
{

    private $container;
    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    // Return RNG on dice roll
    public function roll($diceId)
    {
        $dice = $this->em->getRepository('RpgmsBundle\Entity\Dice')->findOneById($diceId);
        if(!$dice){
            return true;
        }
        
        return rand($dice->getMinRange(), $dice->getMaxRange());
    }
    
    public function setRollSet($form, $worldId)
    {
        
    }

    /**
     *  Methods:
     *  getDice(): (Get Dice by Id/Name?)
     *  Roll(id): Retrieve data on dice, roll and return the results
     */
}
