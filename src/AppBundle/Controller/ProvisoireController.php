<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Provisoire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Provisoire controller.
 *
 * @Route("provisoire")
 */
class ProvisoireController extends Controller
{
    /**
     * Lists all provisoire entities.
     *
     * @Route("/", name="provisoire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $provisoires = $em->getRepository('AppBundle:Provisoire')->findAll();

        return $this->render('provisoire/index.html.twig', array(
            'provisoires' => $provisoires,
        ));
    }

    /**
     * Creates a new provisoire entity.
     *
     * @Route("/new", name="provisoire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $provisoire = new Provisoire();
        $form = $this->createForm('AppBundle\Form\ProvisoireType', $provisoire);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($provisoire);
            $em->flush($provisoire);

            return $this->redirectToRoute('provisoire_index');
        }

        $sousseries = $em->getRepository('AppBundle:Sousserie')->getSousserie();
        $conservations = $em->getRepository('AppBundle:Conservation')->getConservation();

        return $this->render('provisoire/new.html.twig', array(
            'provisoire' => $provisoire,
            'form' => $form->createView(),
            'sousseries' => $sousseries,
            'conservations' => $conservations,
        ));
    }

    /**
     * Finds and displays a provisoire entity.
     *
     * @Route("/{id}", name="provisoire_show")
     * @Method("GET")
     */
    public function showAction(Provisoire $provisoire)
    {
        $deleteForm = $this->createDeleteForm($provisoire);

        return $this->render('provisoire/show.html.twig', array(
            'provisoire' => $provisoire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing provisoire entity.
     *
     * @Route("/{id}/edit", name="provisoire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Provisoire $provisoire)
    {
        $deleteForm = $this->createDeleteForm($provisoire);
        $editForm = $this->createForm('AppBundle\Form\ProvisoireType', $provisoire);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('provisoire_index');
        }

        $sousseries = $em->getRepository('AppBundle:Sousserie')->getSousserie();
        $conservations = $em->getRepository('AppBundle:Conservation')->getConservation();

        return $this->render('provisoire/edit.html.twig', array(
            'provisoire' => $provisoire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'sousseries' => $sousseries,
            'conservations' => $conservations,
        ));
    }

    /**
     * Deletes a provisoire entity.
     *
     * @Route("/{id}", name="provisoire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Provisoire $provisoire)
    {
        $form = $this->createDeleteForm($provisoire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($provisoire);
            $em->flush($provisoire);
        }

        return $this->redirectToRoute('provisoire_index');
    }

    /**
     * Creates a form to delete a provisoire entity.
     *
     * @param Provisoire $provisoire The provisoire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Provisoire $provisoire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('provisoire_delete', array('id' => $provisoire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
