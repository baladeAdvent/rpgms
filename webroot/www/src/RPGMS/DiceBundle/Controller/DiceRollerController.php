<?php

namespace RPGMS\DiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DiceRollerController extends Controller
{
    /**
     * @Route("/dice", name="Dice Roller")
     */
    public function rollerAction()
    {
        return new Response('Dice Roller');
        #return $this->render('RPGMSDiceBundle:Default:index.html.twig');
    }
}
