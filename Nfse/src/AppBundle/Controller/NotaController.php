<?php

namespace AppBundle\Controller;

use BeSimple\SoapCommon\Type\KeyValue\String;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Nota;
use AppBundle\Form\NotaType;

/**
 * Nota controller.
 *
 * @Route("/nota")
 */
class NotaController extends Controller
{
    /**
     * Lists all Nota entities.
     *
     * @Route("/", name="nota_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $notas = $em->getRepository('AppBundle:Nota')->findAll();

        return $this->render('nota/index.html.twig', array(
            'notas' => $notas,
        ));
    }

    /**
     * Creates a new Nota entity.
     *
     * @Route("/new", name="nota_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
//        $notum = new Nota();
//        $form = $this->createForm('AppBundle\Form\NotaType', $notum);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($notum);
//            $em->flush();
//
//            return $this->redirectToRoute('nota_show', array('id' => $notum->getId()));
//        }
//
//        return $this->render('nota/new.html.twig', array(
//            'notum' => $notum,
//            'form' => $form->createView(),
//        ));


        $em = $this->getDoctrine()->getManager();

        $numeroNota = $this->getNewNF();
        $data       = date("d/m/Y");
        $clientes   = $em->createQueryBuilder()
            ->select('c.nome, c.cpfcnpj')
            ->from('AppBundle:Cliente', 'c')
            ->where('c.empresa = :empresa')->setParameter('empresa', $this->getEmpresa())
            ->getQuery();

        $formValues = [
            'numeroNota' => $numeroNota,
            'data'       => $data,
            'clientes'   => $clientes
        ];

        return $this->render('nota/newnfse.html.twig', array(
            'formValues' => $formValues,
        ));
    }

    public function getClientes($txt){
    //select * from cliente where nome like '%%' and empresa=1
    }

    public function getNewNF(){
        $em = $this->getDoctrine()->getManager();

        $highest_id = $em->createQueryBuilder()
            ->select('MAX(n.numeroNota)')
            ->from('AppBundle:Nota', 'n')
            ->where('n.empresa = :empresa')->setParameter('empresa', $this->getEmpresa())
            ->getQuery()
            ->getSingleScalarResult();

        return $highest_id;
    }

    public function getEmpresa(){
        return 1; //Fazer retornar o numero da empresa
    }

    /**
     * Finds and displays a Nota entity.
     *
     * @Route("/{id}", name="nota_show")
     * @Method("GET")
     */
    public function showAction(Nota $notum)
    {
        $deleteForm = $this->createDeleteForm($notum);

        return $this->render('nota/show.html.twig', array(
            'notum' => $notum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Nota entity.
     *
     * @Route("/{id}/edit", name="nota_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Nota $notum)
    {
        $deleteForm = $this->createDeleteForm($notum);
        $editForm = $this->createForm('AppBundle\Form\NotaType', $notum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($notum);
            $em->flush();

            return $this->redirectToRoute('nota_edit', array('id' => $notum->getId()));
        }

        return $this->render('nota/edit.html.twig', array(
            'notum' => $notum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Nota entity.
     *
     * @Route("/{id}", name="nota_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Nota $notum)
    {
        $form = $this->createDeleteForm($notum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($notum);
            $em->flush();
        }

        return $this->redirectToRoute('nota_index');
    }

    /**
     * Creates a form to delete a Nota entity.
     *
     * @param Nota $notum The Nota entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Nota $notum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nota_delete', array('id' => $notum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
