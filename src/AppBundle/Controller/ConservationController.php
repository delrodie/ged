<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Conservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Conservation controller.
 *
 * @Route("conservation")
 */
class ConservationController extends Controller
{
    /**
     * Lists all conservation entities.
     *
     * @Route("/", name="conservation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $conservations = $em->getRepository('AppBundle:Conservation')->findAll();

        return $this->render('conservation/index.html.twig', array(
            'conservations' => $conservations,
        ));
    }

    /**
     * Creates a new conservation entity.
     *
     * @Route("/new", name="conservation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $conservation = new Conservation();
        $form = $this->createForm('AppBundle\Form\ConservationType', $conservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conservation);
            $em->flush($conservation);

            return $this->redirectToRoute('conservation_index');
        }

        return $this->render('conservation/new.html.twig', array(
            'conservation' => $conservation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a conservation entity.
     *
     * @Route("/{id}", name="conservation_show")
     * @Method("GET")
     */
    public function showAction(Conservation $conservation)
    {
        $deleteForm = $this->createDeleteForm($conservation);

        return $this->render('conservation/show.html.twig', array(
            'conservation' => $conservation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing conservation entity.
     *
     * @Route("/{slug}/edit", name="conservation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Conservation $conservation)
    {
        $deleteForm = $this->createDeleteForm($conservation);
        $editForm = $this->createForm('AppBundle\Form\ConservationType', $conservation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('conservation_index');
        }

        return $this->render('conservation/edit.html.twig', array(
            'conservation' => $conservation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a conservation entity.
     *
     * @Route("/{id}", name="conservation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Conservation $conservation)
    {
        $form = $this->createDeleteForm($conservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($conservation);
            $em->flush($conservation);
        }

        return $this->redirectToRoute('conservation_index');
    }

    /**
     * Creates a form to delete a conservation entity.
     *
     * @param Conservation $conservation The conservation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Conservation $conservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('conservation_delete', array('id' => $conservation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
