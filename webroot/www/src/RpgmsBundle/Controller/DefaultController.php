<?php

namespace RpgmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

use RpgmsBundle\Form\Type\BackEnd\WorldType;
use RpgmsBundle\Form\Type\BackEnd\PlayerCharacterType;
use RpgmsBundle\Entity\World;
use RpgmsBundle\Entity\PlayerCharacter;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('RpgmsBundle:FrontEnd:index.html.twig');
    }
    
    /**
     * @Route("/dashboard", name="rpgms_dashboard")
     */
    public function dashboardAction()
    {
        return $this->render('RpgmsBundle:BackEnd:dashboard.html.twig', array(
                'navLinks' => $this->getDashboardLinks()
            ),
            null,
            null
        );
    }
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @Route("/dashboard/profile", name="rpgms_user_profile")
     */
    public function profileAction()
    {
        return $this->render('RpgmsBundle:BackEnd:profile.html.twig', array(
                'navLinks' => $this->getDashboardLinks()
            ),
                null,
                null
        );
    }
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @Route("/dashboard/characters", name="rpgms_user_characters")
     */
    public function playerCharacterAction()
    {
        return $this->render('RpgmsBundle:BackEnd:characters.html.twig', array(
                'navLinks' => $this->getDashboardLinks()
            ),
                null,
                null
        );
    }
    
    /**
     * @Route("/dashboard/characters/create", name="rpgms_user_characters_create")
     */
    public function newPlayerCharacterAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        
        $playerCharacter = new PlayerCharacter();
        $diceService = $this->get('rpgms.dice_service');
        
        $form = $this->createForm(PlayerCharacterType::class, $playerCharacter, array(
            'user' => $user,
        ));
        
        $form->handleRequest($request);
        
        if($form->isSubmitted()) {
            if($form->isValid()) {
                ladybug_dump($form);
            }else{
                //Form is not valid...
            }
        }
        
        return $this->render('RpgmsBundle:BackEnd:charactercreator.html.twig', array(
                'form' => $form->createView(),
                'navLinks' => $this->getDashboardLinks()
            ),
                null,
                null
        );
    }
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @Route("/dashboard/worlds", name="rpgms_user_worlds")
     */
    public function worldsAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $worlds = $user->getWorlds()->toArray();
        
        return $this->render('RpgmsBundle:BackEnd:worlds.html.twig', array(
                'navLinks' => $this->getDashboardLinks(),
                'worlds' => $worlds
            ),
                null,
                null
        );
    }
    
    /**
     * @Route("/dashboard/worlds/create", name="rpgms_user_worlds_create")
     */
    public function newWorldAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $worldService = $this->get('rpgms.world_service');
        
        $world = new World();
        $diceService = $this->get('rpgms.dice_service');
        
        $form = $this->createForm(WorldType::class, $world, array(
            'user' => $user,
        ));
        
        $form->handleRequest($request);
        
        if($form->isSubmitted()) {
            if($form->isValid()) {
                $worldService->setNewWorld($form);
                return $this->redirectToRoute('rpgms_user_worlds', array());
            }else{
                //Form is not valid...
            }
        }
        
        return $this->render('RpgmsBundle:BackEnd:worldcreator.html.twig', array(
                'form' => $form->createView(),
                'navLinks' => $this->getDashboardLinks()
            ),
                null,
                null
        );
    }
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    protected function getDashboardLinks()
    {
        return array(
            array(
                'name' => 'Profile',
                'route' =>'rpgms_user_profile',
            ),
            array(
                'name' => 'My Characters',
                'route' =>'rpgms_user_characters',
            ),
            array(
                'name' => 'My Worlds',
                'route' =>'rpgms_user_worlds',
            ),
        );
    }
}
