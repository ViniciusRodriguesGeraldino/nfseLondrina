<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Listaservico;
use AppBundle\Form\ListaservicoType;

/**
 * Listaservico controller.
 *
 * @Route("/listaservico")
 */
class ListaservicoController extends Controller
{
    /**
     * Lists all Listaservico entities.
     *
     * @Route("/", name="listaservico_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listaservicos = $em->getRepository('AppBundle:Listaservico')->findAll();

        return $this->render('listaservico/index.html.twig', array(
            'listaservicos' => $listaservicos,
        ));
    }

    /**
     * Creates a new Listaservico entity.
     *
     * @Route("/new", name="listaservico_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $listaservico = new Listaservico();
        $form = $this->createForm('AppBundle\Form\ListaservicoType', $listaservico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listaservico);
            $em->flush();

            return $this->redirectToRoute('listaservico_show', array('id' => $listaservico->getId()));
        }

        return $this->render('listaservico/new.html.twig', array(
            'listaservico' => $listaservico,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Listaservico entity.
     *
     * @Route("/{id}", name="listaservico_show")
     * @Method("GET")
     */
    public function showAction(Listaservico $listaservico)
    {
        $deleteForm = $this->createDeleteForm($listaservico);

        return $this->render('listaservico/show.html.twig', array(
            'listaservico' => $listaservico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Listaservico entity.
     *
     * @Route("/{id}/edit", name="listaservico_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Listaservico $listaservico)
    {
        $deleteForm = $this->createDeleteForm($listaservico);
        $editForm = $this->createForm('AppBundle\Form\ListaservicoType', $listaservico);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listaservico);
            $em->flush();

            return $this->redirectToRoute('listaservico_edit', array('id' => $listaservico->getId()));
        }

        return $this->render('listaservico/edit.html.twig', array(
            'listaservico' => $listaservico,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Listaservico entity.
     *
     * @Route("/{id}", name="listaservico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Listaservico $listaservico)
    {
        $form = $this->createDeleteForm($listaservico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($listaservico);
            $em->flush();
        }

        return $this->redirectToRoute('listaservico_index');
    }

    /**
     * Creates a form to delete a Listaservico entity.
     *
     * @param Listaservico $listaservico The Listaservico entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Listaservico $listaservico)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('listaservico_delete', array('id' => $listaservico->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
