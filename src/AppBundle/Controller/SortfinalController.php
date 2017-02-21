<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sortfinal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sortfinal controller.
 *
 * @Route("sortfinal")
 */
class SortfinalController extends Controller
{
    /**
     * Lists all sortfinal entities.
     *
     * @Route("/", name="sortfinal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sortfinals = $em->getRepository('AppBundle:Sortfinal')->findAll();

        return $this->render('sortfinal/index.html.twig', array(
            'sortfinals' => $sortfinals,
        ));
    }

    /**
     * Creates a new sortfinal entity.
     *
     * @Route("/new", name="sortfinal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sortfinal = new Sortfinal();
        $form = $this->createForm('AppBundle\Form\SortfinalType', $sortfinal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sortfinal);
            $em->flush($sortfinal);

            return $this->redirectToRoute('sortfinal_index');
        }

        return $this->render('sortfinal/new.html.twig', array(
            'sortfinal' => $sortfinal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sortfinal entity.
     *
     * @Route("/{id}", name="sortfinal_show")
     * @Method("GET")
     */
    public function showAction(Sortfinal $sortfinal)
    {
        $deleteForm = $this->createDeleteForm($sortfinal);

        return $this->render('sortfinal/show.html.twig', array(
            'sortfinal' => $sortfinal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sortfinal entity.
     *
     * @Route("/{slug}/edit", name="sortfinal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sortfinal $sortfinal)
    {
        $deleteForm = $this->createDeleteForm($sortfinal);
        $editForm = $this->createForm('AppBundle\Form\SortfinalType', $sortfinal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sortfinal_index');
        }

        return $this->render('sortfinal/edit.html.twig', array(
            'sortfinal' => $sortfinal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sortfinal entity.
     *
     * @Route("/{id}", name="sortfinal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sortfinal $sortfinal)
    {
        $form = $this->createDeleteForm($sortfinal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sortfinal);
            $em->flush($sortfinal);
        }

        return $this->redirectToRoute('sortfinal_index');
    }

    /**
     * Creates a form to delete a sortfinal entity.
     *
     * @param Sortfinal $sortfinal The sortfinal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sortfinal $sortfinal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sortfinal_delete', array('id' => $sortfinal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
