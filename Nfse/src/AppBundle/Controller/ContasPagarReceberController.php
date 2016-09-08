<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ContasPagarReceber;

/**
 * ContasPagarReceber controller.
 *
 * @Route("/contaspagarreceber")
 */
class ContasPagarReceberController extends Controller
{
    /**
     * Lists all ContasPagarReceber entities.
     *
     * @Route("/", name="contas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contas = $em->getRepository('AppBundle:ContasPagarReceber')->findBy(array('empresa' => $this->get('app.emp')->getIdEmpresa()));

        return $this->render('contas/index.html.twig', array(
            'contas' => $contas,
        ));
    }

    /**
     * Creates a new ContasPagarReceber entity.
     *
     * @Route("/new", name="contas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $data       = date("d/m/Y");
        $clientes   = $em->createQueryBuilder()
            ->select('c.nome, c.cpfcnpj')
            ->from('AppBundle:Cliente', 'c')
            ->where('c.empresa = :empresa')->setParameter('empresa', $this->get('app.emp')->getIdEmpresa())
            ->getQuery();

        $formValues = [
            'data'       => $data,
            'clientes'   => $clientes

        ];

        return $this->render('contas/new.html.twig' , array('formValues' => $formValues,));
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
