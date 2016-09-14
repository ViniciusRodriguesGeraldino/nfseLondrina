<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Bancos;
use AppBundle\Form\BancosType;

/**
 * Bancos controller.
 *
 * @Route("/bancos")
 */
class BancosController extends Controller
{
    /**
     * Lists all Bancos entities.
     *
     * @Route("/", name="bancos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bancos = $em->getRepository('AppBundle:Bancos')->findBy(array('empresa' => $this->get('app.emp')->getIdEmpresa()));

        return $this->render('bancos/index.html.twig', array(
            'bancos' => $bancos,
        ));
    }

    /**
     * Creates a new Bancos entity.
     *
     * @Route("/new", name="bancos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $banco = new Bancos();
        $form = $this->createForm('AppBundle\Form\BancosType', $banco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($banco);
            $em->flush();

            return $this->redirectToRoute('bancos_show', array('id' => $banco->getIdBanco()));
        }

        return $this->render('bancos/new.html.twig', array(
            'banco' => $banco,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Bancos entity.
     *
     * @Route("/{id}", name="bancos_show")
     * @Method("GET")
     */
    public function showAction(Bancos $banco)
    {
        $deleteForm = $this->createDeleteForm($banco);

        return $this->render('bancos/show.html.twig', array(
            'banco' => $banco,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Bancos entity.
     *
     * @Route("/{id}/edit", name="bancos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bancos $banco)
    {
        $deleteForm = $this->createDeleteForm($banco);
        $editForm = $this->createForm('AppBundle\Form\BancosType', $banco);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($banco);
            $em->flush();

            return $this->redirectToRoute('bancos_edit', array('id' => $banco->getIdBanco()));
        }

        return $this->render('bancos/edit.html.twig', array(
            'banco' => $banco,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Bancos entity.
     *
     * @Route("/{id}", name="bancos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bancos $banco)
    {
        $form = $this->createDeleteForm($banco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($banco);
            $em->flush();
        }

        return $this->redirectToRoute('bancos_index');
    }

    /**
     * Creates a form to delete a Bancos entity.
     *
     * @param Bancos $banco The Bancos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bancos $banco)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bancos_delete', array('id' => $banco->getIdBanco())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
