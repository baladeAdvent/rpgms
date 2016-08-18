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
        $rollSet = $form->getData();
        $rolls = $rollSet->getRoll();

        //Set date on Rollset
        $rollSet->setDate(new \DateTime("NOW"));

        //Calculate individual roll results
        foreach($rolls as $roll)
        {
            $roll->setResult($this->roll($roll->getDice()));
            $roll->setRollSet($rollSet);
        }

        //Calculate Final Result
        $rollSet->setResult($this->calculateRollSetResult($rollSet));

        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        ladybug_dump( $rollSet );

        ladybug_dump($rolls->count());

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        #$em = $this->getDoctrine()->getManager();
        $this->em->persist($rollSet);
        $this->em->flush();
        #return $this->redirectToRoute('task_success');
    }
    
    private function calculateRollSetResult($rollSet)
    {
        $bonus = $rollSet->getBonus();
        $penalty = $rollSet->getPenalty();
        $total = 0;
        foreach($rollSet->getRolls() as $roll)
        {
            $total += $roll->getResult();
        }
        
        return $total + $bonus - $penalty;
    }
    /**
     *  Methods:
     *  getDice(): (Get Dice by Id/Name?)
     *  Roll(id): Retrieve data on dice, roll and return the results
     */
}
