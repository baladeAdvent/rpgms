<?php

namespace RpgmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

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
//        $user = $this->getUser();
        $user = 'testUser';
//        
//        if (!is_object($user) || !$user instanceof UserInterface) {
//            throw new AccessDeniedException('This user does not have access to this section.');
//        }
        
        return $this->render('RpgmsBundle:BackEnd:dashboard.html.twig', array(
                'user' => $user
            ),
            null,
            null
        );
    }
    
    /**
     * @Route("/profile2", name="rpgms_user_profile")
     */
    public function profileAction()
    {
        return $this->render('RpgmsBundle:BackEnd:dashboard.html.twig');
    }
    
    /**
     * @Route("/characters", name="rpgms_user_characters")
     */
    public function playerCharacterAction()
    {
        return $this->render('RpgmsBundle:BackEnd:dashboard.html.twig');
    }
    
    /**
     * @Route("/worlds", name="rpgms_user_worlds")
     */
    public function worldsAction()
    {
        return $this->render('RpgmsBundle:BackEnd:dashboard.html.twig');
    }
}
