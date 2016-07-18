<?php

namespace RpgmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("", name="Homepage")
     */
    public function indexAction()
    {
        return new Response('RPGMS Index');
        #return $this->render('RpgmsBundle:Default:index.html.twig');
    }
}
