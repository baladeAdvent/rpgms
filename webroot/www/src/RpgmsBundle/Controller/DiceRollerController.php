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
        /**
         *  Need some sort of method/service to determine active world for this user, probably pull off the character being used
         *  For now using static variable
         */
        $worldService = $this->get('rpgms.world_service');
        $world = $worldService->getWorldByName('testWorld');

        $dice = $world->getDice()->current();
        
        $rollSet = new RollSet;
        
        $roll = new Roll;
        $roll->setDice($dice);
        $roll->setRollSet($rollSet);
        
        $rollSet->addRoll($roll);
        
        $form = $this->createForm(RollSetType::class, $rollSet, array(
            'world' => $world->getId(),
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $rollSet = $form->getData();
            ladybug_dump($form);

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($task);
            // $em->flush();

            #return $this->redirectToRoute('task_success');
        }
        
        return $this->render('RpgmsBundle:Diceroller:roller.html.twig', array(
            'form' => $form->createView()
        ),null,null);
    }

    /**
     * @Route("/dice_submit", name="Roll Processing")
     */
    public function rollSubmitAction(Request $request)
    {
        
    }

}
