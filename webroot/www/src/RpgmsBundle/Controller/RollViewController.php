<?php

namespace RpgmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class RollViewController extends Controller
{
    /**
     * @Route("/rollviewer", name="Roll Viewer")
     */
    public function indexAction()
    {
        return new Response('RPGMS Roll Viewer');
        #return $this->render('RpgmsBundle:Default:index.html.twig');
    }
    
    
    /**
     *  @Route("/getrolls/{worldName}/{count}", name="Get Rolls")
     */
    public function rollViewAction($worldName, $count)
    {        
        $diceService = $this->get('rpgms.dice_service');
        $worldService = $this->get('rpgms.world_service');
        $world = $worldService->getWorldByName($worldName);

        // Request recent # of rolls from RollView service
        $rollSets = $world->getRollSets();
        foreach($rollSets as $rollset)
        {
            ladybug_dump($rollset);
        }
        
        
//        return new Response('JSON response here...');
        return $this->render('RpgmsBundle:Rollviewer:rollview.html.twig', 
                array(
                    "rollsets" => $rollSets
                ), 
                null, 
                null
        );
    }
}
