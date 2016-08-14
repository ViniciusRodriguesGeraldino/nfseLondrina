<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Servico;
use AppBundle\Form\ServicoType;

/**
 * Servico controller.
 *
 * @Route("/servico")
 */
class ServicoController extends Controller
{
    /**
     * Lists all Servico entities.
     *
     * @Route("/", name="servico_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $servicos = $em->getRepository('AppBundle:Servico')->findAll();

        return $this->render('servico/index.html.twig', array(
            'servicos' => $servicos,
        ));
    }

    /**
     * Creates a new Servico entity.
     *
     * @Route("/new", name="servico_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $servico = new Servico();
        $form = $this->createForm('AppBundle\Form\ServicoType', $servico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servico);
            $em->flush();

            return $this->redirectToRoute('servico_show', array('id' => $servico->getId()));
        }

        return $this->render('servico/new.html.twig', array(
            'servico' => $servico,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Servico entity.
     *
     * @Route("/{id}", name="servico_show")
     * @Method("GET")
     */
    public function showAction(Servico $servico)
    {
        $deleteForm = $this->createDeleteForm($servico);

        return $this->render('servico/show.html.twig', array(
            'servico' => $servico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Servico entity.
     *
     * @Route("/{id}/edit", name="servico_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Servico $servico)
    {
        $deleteForm = $this->createDeleteForm($servico);
        $editForm = $this->createForm('AppBundle\Form\ServicoType', $servico);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servico);
            $em->flush();

            return $this->redirectToRoute('servico_edit', array('id' => $servico->getId()));
        }

        return $this->render('servico/edit.html.twig', array(
            'servico' => $servico,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Servico entity.
     *
     * @Route("/{id}", name="servico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Servico $servico)
    {
        $form = $this->createDeleteForm($servico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($servico);
            $em->flush();
        }

        return $this->redirectToRoute('servico_index');
    }

    /**
     * Creates a form to delete a Servico entity.
     *
     * @param Servico $servico The Servico entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Servico $servico)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('servico_delete', array('id' => $servico->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
