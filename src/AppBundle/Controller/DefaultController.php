<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // Nombre de rayonnages
        $nbRayonnage = $em->getRepository('AppBundle:Rayonnage')->getNombreRayonnage();
        $nbEpi = $em->getRepository('AppBundle:Epi')->getNombreEpi();
        $nbProvisoire = $em->getRepository('AppBundle:Provisoire')->getNombreProvisoire();
        $nbDefinitive = $em->getRepository('AppBundle:Definitive')->getNombreDefinitive();

        return $this->render('default/index.html.twig', array(
          'nbRayonnage' => $nbRayonnage,
          'nbEpi' => $nbEpi,
          'nbProvisoire' => $nbProvisoire,
          'nbDefinitive' => $nbDefinitive,
        ));

        //return $this->redirect('fos_user_security_login');
    }
}
