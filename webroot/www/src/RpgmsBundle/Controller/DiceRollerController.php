<?php

namespace RpgmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use RpgmsBundle\Entity\RollSet;
use RpgmsBundle\Entity\Roll;
use RpgmsBundle\Form\Type\DiceRoller\RollSetType;

class DiceRollerController extends Controller
{

    /**
     * @Route("/dice", name="Dice Roller")
     */
    public function rollerAction(Request $request)
    {
        $worldService = $this->get('rpgms.world_service');
        /**
         *  Need some sort of method/service to determine active world for this user, probably pull off the character being used
         *  For now using static variable
         */
        $world = 1;
        
        /**
         *  Get Dicebag for current world
         */
        $diceBag = $worldService->getDiceBag($world);
        
        $rollSet = new RollSet;
        
        $roll = new Roll();
        #$roll->setDice(4);
        #$roll->setRollSet();
        
        $rollSet->addRoll($roll);
        
        $form = $this->createForm(RollSetType::class, $rollSet, array(
            'diceBag' => $diceBag,
        ));
        $form->handleRequest($request);
        
        return $this->render('RpgmsBundle:Diceroller:roller.html.twig', array(
            'diceBag' => $diceBag,
            'form' => $form->createView()
        ),null,null);
    }

}
