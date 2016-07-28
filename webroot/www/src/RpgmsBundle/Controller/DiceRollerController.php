<?php

namespace RpgmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

use RpgmsBundle\Form\Type\DiceRoller\RollSetType;

class DiceRollerController extends Controller
{

    /**
     * @Route("/dice", name="Dice Roller")
     */
    public function rollerAction()
    {
        $form = $this->createForm(RollSetType::class, null);
        #return new Response('Dice Roller');
        return $this->render('RpgmsBundle:Diceroller:roller.html.twig', array(
            'test' => 'test',
            'form' => $form->createView()
        ),null,null);
    }

}
