<?php

namespace AppBundle\Controller;

use BeSimple\SoapCommon\Type\KeyValue\String;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Nota;
use AppBundle\Entity\Cliente;
use AppBundle\Form\NotaType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Length;


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

        if ($highest_id == '')
            $highest_id = 0;

        $highest_id += 1;

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

    /**
     *
     * @Route("/SalvarNota", name="SalvarNota")
     * @Method({"POST"})
     */
    public function getContentAsArray(Request $request){

        $nota = new Nota();

        $nota->setNumeroNota($request->request->get('numeroNota', null));
        $nota->setEmpresa($this->getEmpresa());
        $nota->setCliente($request->request->get('cliente', null));

        $nota->setTotal($request->request->get('valorTotLiq', null));
        $nota->setDesconto($request->request->get('valorDesconto', null));
        $nota->setTotalBruto($nota->getTotal()+$nota->getDesconto());

        $nota->setTaxaExtra(0);

        $timestamp = strtotime($request->request->get('dataNota', null));
        $nota->setData(date("Y-m-d H:i:s", $timestamp));

        $nota->setTipoNota('NFSE');

        $nota->setAno($this->getYear($nota->getData()));
        $nota->setMes($this->getMonth($nota->getData()));

        $nota->setAutenticidade('');
        $nota->setNumeroNotaSubstitutiva('');
        $nota->setIdFaturamento('');

//        $nota->setPercPis();
//        $nota->setPis();
//        $nota->setPisOrig();
//
//        $nota->setCsl();
//        $nota->setCslOrig();
//
//        $nota->setCofins();
//        $nota->setCofinsOrig();
//
//        $nota->setInss();
//        $nota->setInssOrig();
//
//        $nota->setIss();
//        $nota->setIssOrig();
//        $nota->setIssRetido();
//        $nota->setIssRetidoOrig();
//        $nota->setBaseIss();
//
//        $nota->setIrrf();
//        $nota->setIrrfOrig();
//
//        $nota->setCancelada();
//        $nota->setMotivo();
//        $nota->setAutenticidadeCancelamento();
//        $nota->setLinkimpressaoCancelamento();

        $em = $this->getDoctrine()->getManager();
        $em->persist($nota);
        $em->flush();

        $response['success'] = true;
        return new JsonResponse( $response );

    }

    public function getYear($pdate) {
        $date = DateTime::createFromFormat("Y-m-d", $pdate);
        return $date->format("Y");
    }

    public function getMonth($pdate) {
        $date = DateTime::createFromFormat("Y-m-d", $pdate);
        return $date->format("m");
    }

    public function getDay($pdate) {
        $date = DateTime::createFromFormat("Y-m-d", $pdate);
        return $date->format("d");
    }

    /**
     *
     * @Route("/loadClientes", name="loadClientes")
     * @Method({"POST"})
     */
    public function loadClientes(Request $request){

        $valor = $request->request->get('str', null);

        $repo = $this->getDoctrine()
            ->getRepository('AppBundle:Cliente');
        $query = $repo->createQueryBuilder('a')
            ->select('a.id,a.nome,a.cpfcnpj')
            ->where('a.nome LIKE :val')
            ->andWhere('a.empresa = :emp')
            ->setParameter('val', '%'.$valor.'%')
            ->setParameter('emp', $this->getEmpresa())
            ->getQuery();
        $result = $query->getArrayResult();

        foreach ($result as $value) {
            $ret2[] = $value['id'].' - '.$value['nome'].' - '.$value['cpfcnpj'];
        }

        return new JsonResponse( $ret2 );

    }

    /**
     *
     * @Route("/loadItemServico", name="loadItemServico")
     * @Method({"POST"})
     */
    public function loadItemServico(Request $request){
        $repo = $this->getDoctrine()
            ->getRepository('AppBundle:Servico');
        $query = $repo->createQueryBuilder('s')
            ->select('s.id, s.descricao, s.valor')
            ->where('s.idEmpresa = :emp')
            ->setParameter('emp', $this->getEmpresa())
            ->getQuery();
        $result = $query->getArrayResult();

        foreach ($result as $value) {
            $ret2[] = $value['id'].' - '.$value['descricao'].' ('.$value['valor'].')';
        }

        return new JsonResponse( $ret2 );

    }


    /**
     *
     * @Route("/getValoresServico", name="getValoresServico")
     * @Method({"POST"})
     */
    public function getValoresServico(Request $request){
        $idServico = $request->request->get('idServico', null);

        $repo = $this->getDoctrine()->getRepository('AppBundle:Servico');

        $query = $repo->createQueryBuilder('s')
            ->select('s.id, s.descricao, s.codSerPref, s.valor, s.percIss')
            ->where('s.idEmpresa = :emp')
            ->andWhere('s.id = :idserv')
            ->setParameter('emp', $this->getEmpresa())
            ->setParameter('idserv', $idServico)
            ->getQuery();

        $result = $query->getArrayResult();

        return new JsonResponse($result);

    }    
}
