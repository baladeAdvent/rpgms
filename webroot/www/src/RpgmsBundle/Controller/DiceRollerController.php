<?php

namespace RpgmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use RpgmsBundle\Form\Type\DiceRoller\RollSetType;
use RpgmsBundle\Form\Type\DiceRoller\DiceType;

class DiceRollerController extends Controller
{

    /**
     * @Route("/dice", name="Dice Roller")
     */
    public function rollerAction(Request $request)
    {
        $world = 1;
        $rollSetType = new RollSetType($world);
        $form = $this->createForm($rollSetType, null);
        $form->handleRequest($request);
        #return new Response('Dice Roller');
        return $this->render('RpgmsBundle:Diceroller:roller.html.twig', array(
            'test' => 'test',
            'form' => $form->createView()
        ),null,null);
    }

}
