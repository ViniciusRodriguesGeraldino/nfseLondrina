<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Plano;
use AppBundle\Form\PlanoType;

/**
 * Plano controller.
 *
 * @Route("/plano")
 */
class PlanoController extends Controller
{
    /**
     * Lists all Plano entities.
     *
     * @Route("/", name="plano_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $planos = $em->getRepository('AppBundle:Plano')->findBy(array('empresa' => $this->get('app.emp')->getIdEmpresa()));

        return $this->render('plano/index.html.twig', array(
            'planos' => $planos,
        ));
    }

    /**
     * Creates a new Plano entity.
     *
     * @Route("/new", name="plano_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $plano = new Plano();
        $form = $this->createForm('AppBundle\Form\PlanoType', $plano);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plano);
            $em->flush();

            return $this->redirectToRoute('plano_show', array('id' => $plano->getId()));
        }

        return $this->render('plano/new.html.twig', array(
            'plano' => $plano,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Plano entity.
     *
     * @Route("/{id}", name="plano_show")
     * @Method("GET")
     */
    public function showAction(Plano $plano)
    {
        $deleteForm = $this->createDeleteForm($plano);

        return $this->render('plano/show.html.twig', array(
            'plano' => $plano,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Plano entity.
     *
     * @Route("/{id}/edit", name="plano_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Plano $plano)
    {
        $deleteForm = $this->createDeleteForm($plano);
        $editForm = $this->createForm('AppBundle\Form\PlanoType', $plano);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plano);
            $em->flush();

            return $this->redirectToRoute('plano_edit', array('id' => $plano->getId()));
        }

        return $this->render('plano/edit.html.twig', array(
            'plano' => $plano,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Plano entity.
     *
     * @Route("/{id}", name="plano_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Plano $plano)
    {
        $form = $this->createDeleteForm($plano);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plano);
            $em->flush();
        }

        return $this->redirectToRoute('plano_index');
    }

    /**
     * Creates a form to delete a Plano entity.
     *
     * @param Plano $plano The Plano entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Plano $plano)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('plano_delete', array('id' => $plano->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
