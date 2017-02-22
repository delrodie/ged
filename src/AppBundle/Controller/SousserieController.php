<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sousserie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sousserie controller.
 *
 * @Route("sousserie")
 */
class SousserieController extends Controller
{
    /**
     * Lists all sousserie entities.
     *
     * @Route("/", name="sousserie_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sousseries = $em->getRepository('AppBundle:Sousserie')->findAll();

        return $this->render('sousserie/index.html.twig', array(
            'sousseries' => $sousseries,
        ));
    }

    /**
     * Creates a new sousserie entity.
     *
     * @Route("/new", name="sousserie_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sousserie = new Sousserie();
        $form = $this->createForm('AppBundle\Form\SousserieType', $sousserie);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sousserie);
            $em->flush($sousserie);

            return $this->redirectToRoute('sousserie_index');
        }

        $series = $em->getRepository('AppBundle:Serie')->getSerie();

        return $this->render('sousserie/new.html.twig', array(
            'sousserie' => $sousserie,
            'form' => $form->createView(),
            'series' => $series,
        ));
    }

    /**
     * Finds and displays a sousserie entity.
     *
     * @Route("/{id}", name="sousserie_show")
     * @Method("GET")
     */
    public function showAction(Sousserie $sousserie)
    {
        $deleteForm = $this->createDeleteForm($sousserie);

        return $this->render('sousserie/show.html.twig', array(
            'sousserie' => $sousserie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sousserie entity.
     *
     * @Route("/{id}/edit", name="sousserie_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sousserie $sousserie)
    {
        $deleteForm = $this->createDeleteForm($sousserie);
        $editForm = $this->createForm('AppBundle\Form\SousserieType', $sousserie);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sousserie_index');
        }

        $series = $em->getRepository('AppBundle:Serie')->getSerie();

        return $this->render('sousserie/edit.html.twig', array(
            'sousserie' => $sousserie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'series' => $series,
        ));
    }

    /**
     * Deletes a sousserie entity.
     *
     * @Route("/{id}", name="sousserie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sousserie $sousserie)
    {
        $form = $this->createDeleteForm($sousserie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sousserie);
            $em->flush($sousserie);
        }

        return $this->redirectToRoute('sousserie_index');
    }

    /**
     * Creates a form to delete a sousserie entity.
     *
     * @param Sousserie $sousserie The sousserie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sousserie $sousserie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sousserie_delete', array('id' => $sousserie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
