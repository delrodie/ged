<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Epi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Rayonnage;

/**
 * Epi controller.
 *
 * @Route("epi")
 */
class EpiController extends Controller
{
    /**
     * Lists all epi entities.
     *
     * @Route("/", name="epi_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $epis = $em->getRepository('AppBundle:Epi')->findAll();

        return $this->render('epi/index.html.twig', array(
            'epis' => $epis,
        ));
    }

    /**
     * Creates a new epi entity.
     *
     * @Route("/new", name="epi_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $epi = new Epi();
        $form = $this->createForm('AppBundle\Form\EpiType', $epi);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // Recuperation du rayonnage
            $rayon = trim($epi->getTampon(), "'");
            //$rayon = $epi->getTampon();
            //die($rayon);
            $epi->setRayonnage($rayon);
            //die($rayon);

            $em->persist($epi);
            $em->flush($epi);

            return $this->redirectToRoute('epi_index');
        }


        $rayons = $em->getRepository('AppBundle:Rayonnage')->getRayonnage();

        return $this->render('epi/new.html.twig', array(
            'epi' => $epi,
            'form' => $form->createView(),
            'rayons' => $rayons,
        ));
    }

    /**
     * Finds and displays a epi entity.
     *
     * @Route("/{id}", name="epi_show")
     * @Method("GET")
     */
    public function showAction(Epi $epi)
    {
        $deleteForm = $this->createDeleteForm($epi);

        return $this->render('epi/show.html.twig', array(
            'epi' => $epi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing epi entity.
     *
     * @Route("/{id}/edit", name="epi_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Epi $epi)
    {
        $deleteForm = $this->createDeleteForm($epi);
        $editForm = $this->createForm('AppBundle\Form\EpiType', $epi);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('epi_index');
        }

        $rayons = $em->getRepository('AppBundle:Rayonnage')->getRayonnage();

        return $this->render('epi/edit.html.twig', array(
            'epi' => $epi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'rayons' => $rayons,
        ));
    }

    /**
     * Deletes a epi entity.
     *
     * @Route("/{id}", name="epi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Epi $epi)
    {
        $form = $this->createDeleteForm($epi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($epi);
            $em->flush($epi);
        }

        return $this->redirectToRoute('epi_index');
    }

    /**
     * Creates a form to delete a epi entity.
     *
     * @param Epi $epi The epi entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Epi $epi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('epi_delete', array('id' => $epi->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
