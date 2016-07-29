<?php

namespace RpgmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use RpgmsBundle\Entity\RollSet;
use RpgmsBundle\Form\Type\DiceRoller\RollSetType;

class DiceRollerController extends Controller
{

    /**
     * @Route("/dice", name="Dice Roller")
     */
    public function rollerAction(Request $request)
    {
        $world = 1;
        $rollSet = new RollSet;
        
        $form = $this->createForm(RollSetType::class, $rollSet);
        $form->handleRequest($request);
        
        return $this->render('RpgmsBundle:Diceroller:roller.html.twig', array(
            'test' => 'test',
            'form' => $form->createView()
        ),null,null);
    }

}
