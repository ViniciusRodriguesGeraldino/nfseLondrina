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
use Symfony\Component\Validator\Constraints\DateTime;


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
        $idEmp = $this->getEmpresa();

        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();
        $qb ->select('n.id, n.numeroNota, n.data, n.status, n.total', 'c.nome')
            ->from('AppBundle:Nota', 'n')
            ->leftJoin('AppBundle:Cliente', 'c', \Doctrine\ORM\Query\Expr\Join::WITH, 'n.cliente = c.id')
            ->where('n.empresa = :emp')
            ->setParameter('emp', $idEmp);

        $notas = $qb->getQuery()->getResult();

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
    public function SalvarNota(Request $request){

        $nota = new Nota();

        $numeroNota = $request->request->get('numeroNota', null);

        if (!$this->validaNumeroNota($numeroNota)){
            $response['success'] = false;
            $response['msg'] = 'O Número '.$numeroNota.' para esta nota já esta em uso.';
            return new JsonResponse( $response );
        }

        $nota->setNumeroNota($numeroNota);
        $nota->setEmpresa($this->getEmpresa());

        $idAux = $request->request->get('NomeCliente', null);
        $idAux2 = explode('-', $idAux);
        $idCliente = trim($idAux2[0]);
        $nota->setCliente($idCliente);

        $nota->setTotal($request->request->get('valorTotLiq', null));
        $nota->setDesconto($request->request->get('valorDesconto', null));
        $nota->setTotalBruto($nota->getTotal()+$nota->getDesconto());

        $data = $request->request->get('dataNota', null);
//        $nota->setData(\DateTime::createFromFormat('d-m-Y', $data));

        $nota->setAno($this->getYear($data));
        $nota->setMes($this->getMonth($data));

        $nota->setTipoNota('NFSE');
        $nota->setAutenticidade('');
        $nota->setNumeroNotaSubstitutiva('0');
        $nota->setIdFaturamento('0');
        $nota->setObservacao($request->request->get('txtAreaObs', null));
        $nota->setFormapagamento($request->request->get('formaPagamento', null));

//        $nota->setPercPis();
        $nota->setPis($request->request->get('pis', null));
//        $nota->setPisOrig();
//
        $nota->setCsl($request->request->get('csl', null));
//        $nota->setCslOrig();
//
        $nota->setCofins($request->request->get('cofins', null));
//        $nota->setCofinsOrig();
//
        $nota->setInss($request->request->get('inss', null));
//        $nota->setInssOrig();
//
//        $nota->setIss($request->request->get('iss', null));
//        $nota->setIssOrig();
        $nota->setIssRetido($request->request->get('iss', null));
//        $nota->setIssRetidoOrig();
        $nota->setBaseIss($request->request->get('base_calculo', null));
//
        $nota->setIrrf($request->request->get('irrf', null));
//        $nota->setIrrfOrig();
//
//        $nota->setCancelada();
//        $nota->setMotivo();
//        $nota->setAutenticidadeCancelamento();
//        $nota->setLinkimpressaoCancelamento();

        $nota->setStatus('Não Enviada');

        $em = $this->getDoctrine()->getManager();
        $em->persist($nota);
        $em->flush();

        $retorno = $this->enviarNotaLondrina($nota);

        if($retorno[0]){
            $response['success'] = true;
            return new JsonResponse( $response );
        }else
        {
            $response['success'] = false;
            return new JsonResponse( $response );
        }

    }

    public function validaNumeroNota($numeroNota){
        $id = $this->getEmpresa();

        $repo = $this->getDoctrine()
            ->getRepository('AppBundle:Nota');
        $query = $repo->createQueryBuilder('n')
            ->select('n.numeroNota')
            ->where('n.empresa = :emp')
            ->andWhere('n.numeroNota = :nota')
            ->setParameter('emp', $id)
            ->setParameter('nota', $numeroNota)
            ->getQuery();
        $result = $query->getResult();

        if (count($result) == 0){
            return true;
        }else{
            return false;
        }
    }

    public function enviarNotaLondrina(Nota $nota){

//        require_once '../../vendor/autoload.php';

        require_once 'C:\xampp\htdocs\NFSE\nfseLondrina\Nfse\vendor\autoload.php';

        $cliente = $this->getCliente($nota->getCliente());
        $empresa = $this->getEmpresaValues();
        $servico = $this->getServicoValues(1); //Arrumar aqui

        if($empresa[0]['producao'] == 'N') {
            $wsdl = 'http://testeiss.londrina.pr.gov.br/ws/v1_03/sigiss_ws.php?wsdl';
        }else{
            $wsdl = 'https://iss.londrina.pr.gov.br/ws/v1_03/sigiss_ws.php?wsdl';
        }

        $soapClient = new \BeSimple\SoapClient\SoapClient($wsdl);

        $gera = new \stdClass();

        $gera->WSRetornoNota                   = ''; //out RetornoNota: tcRetornoNota;
        $gera->WSDescErros                     = ''; //out Mensagens: tcListaErrosAlertas;
        $gera->ccm                             = $empresa[0]['cmc']; //const ccm: Integer;
        $gera->cnpj                            = $empresa[0]['cpfcnpj']; //const cnpj: String;
        $gera->cpf                             = $empresa[0]['cpfPrefeitura']; //const cpf: String;
        $gera->senha                           = $empresa[0]['senhaPrefeitura']; //const senha: String;
        $gera->aliquota                        = $servico[0]['percIss']; //const aliquota: String;
        $gera->servico                         = str_replace('.', '', $servico[0]['codSerPref']); //const servico: Integer;
        $gera->codigo_obra                     = ''; //const codigo_obra: String;
        $gera->obra_art                        = ''; //const obra_art: String;
        $gera->situacao                        = 'tp'; //const situacao: String; tp – Tributada no prestador; tt – Tributada no tomador; tf – Tributado Fixo; is – Isenta/Imune; nt – Outro município; si– Exportação; ca - Cancelada
        $gera->valor                           = str_replace('.', ',', $nota->getTotal()); //const valor: String;
        $gera->base                            = str_replace('.', ',', $nota->getBaseIss()); //const base: String;
        $gera->ir                              = str_replace('.', ',', $nota->getIrrf()); //const ir: String;
        $gera->pis                             = str_replace('.', ',', $nota->getPis()); //const pis: String;
        $gera->cofins                          = str_replace('.', ',', $nota->getCofins()); //const cofins: String;
        $gera->csll                            = str_replace('.', ',', $nota->getCsl()); //const csll: String;
        $gera->inss                            = str_replace('.', ',', $nota->getInss()); //const inss: String;
        $gera->retencao_iss                    = str_replace('.', ',', $nota->getIssRetido()); //const retencao_iss: String;
        $gera->incentivo_fiscal                = ''; //const incentivo_fiscal: Integer;
        $gera->cod_municipio_prestacao_servico = $cliente[0]['codCid']; //const cod_municipio_prestacao_servico: String;
        $gera->cod_pais_prestacao_servico      = ''; //const cod_pais_prestacao_servico: String;
        $gera->cod_municipio_incidencia        = $cliente[0]['codCid']; //const cod_municipio_incidencia: String;
        $gera->descricaoNF                     = $servico[0]['descricao']; //const descricaoNF: String;
        $gera->tomador_tipo                    = $cliente[0]['tipoCliente']; //const tomador_tipo: Integer; 1 – PFNI; 2 – Pessoa Física; 3 – Jurídica do Município; 4 – Jurídica de Fora; 5 – Jurídica de Fora do País
        $gera->tomador_cnpj                    = $cliente[0]['cpfcnpj']; //const tomador_cnpj: String;
        $gera->tomador_email                   = $cliente[0]['eMail']; //const tomador_email: String;
        $gera->tomador_ie                      = $cliente[0]['ie']; //const tomador_ie: String;
        $gera->tomador_im                      = ''; //const tomador_im: String;
        $gera->tomador_razao                   = $cliente[0]['nome']; //const tomador_razao: String;
        $gera->tomador_endereco                = $cliente[0]['endereco']; //const tomador_endereco: String;
        $gera->tomador_numero                  = $cliente[0]['numero']; //const tomador_numero: String;
        $gera->tomador_complemento             = $cliente[0]['complemento']; //const tomador_complemento: String;
        $gera->tomador_bairro                  = $cliente[0]['bairro']; //const tomador_bairro: String;
        $gera->tomador_CEP                     = $cliente[0]['cep']; //const tomador_CEP: String;
        $gera->tomador_cod_cidade              = $cliente[0]['codCid']; //const tomador_cod_cidade: String;
        $gera->tomador_fone                    = $cliente[0]['fone']; //const tomador_fone: string;
        $gera->tomador_ramal                   = ''; //const tomador_ramal: string;
        $gera->tomador_fax                     = ''; //const tomador_fax: string;
//        $gera->rps_num                         = ''; //const rps_num: Integer;
//        $gera->rps_serie                       = ''; //const rps_serie: boolean;
//        $gera->rps_tipo                        = ''; //const rps_tipo: Integer;
//        $gera->rps_dia                         = ''; //const rps_dia: Integer;
//        $gera->rps_mes                         = ''; //const rps_mes: Integer;
//        $gera->rps_ano                         = ''; //const rps_ano: Integer;
        $gera->nfse_substituida                = ''; //const nfse_substituida: Integer;
        $gera->rps_substituido                 = ''; //const rps_substituido: Integer;

        return var_dump($soapClient->GerarNota($gera));

//        return var_dump($soapClient->__getFunctions());
    }

    public function getEmpresaValues(){
        $id = $this->getEmpresa();

        $repo = $this->getDoctrine()
            ->getRepository('AppBundle:Empresa');
        $query = $repo->createQueryBuilder('a')
            ->select('a.cmc, a.cpfcnpj, a.cpfPrefeitura, a.senhaPrefeitura, a.codCid, a.producao')
            ->where('a.id = :emp')
            ->setParameter('emp', $id)
            ->getQuery();
        $result = $query->getResult();

        return $result;
    }

    public function getServicoValues($id){

        $repo = $this->getDoctrine()
            ->getRepository('AppBundle:Servico');
        $query = $repo->createQueryBuilder('s')
            ->select('s.descricao, s.percIss, s.codSerPref, s.descricao')
            ->where('s.idEmpresa = :emp')
            ->andWhere('s.id = :id')
            ->setParameter('emp', $this->getEmpresa())
            ->setParameter('id', $id)
            ->getQuery();
        $result = $query->getResult();

        return $result;
    }

    public function getCliente($id) {

        $repo = $this->getDoctrine()
            ->getRepository('AppBundle:Cliente');
        $query = $repo->createQueryBuilder('c')
            ->select('c.nome, c.cpfcnpj, c.codCid, c.eMail, c.ie, c.endereco, c.complemento, c.numero, c.bairro, c.cep, c.fone, c.tipoCliente')
            ->where('c.id = :val')
            ->andWhere('c.empresa = :emp')
            ->setParameter('val', $id)
            ->setParameter('emp', $this->getEmpresa())
            ->getQuery();
        $result = $query->getResult();

        return $result;
    }

    public function getYear($pdate) {
        $timeStamp = strtotime($pdate);
        $date = new \DateTime();
        $date->setTimestamp($timeStamp);
        return $date->format("Y");
    }

    public function getMonth($pdate) {
        $timeStamp = strtotime($pdate);
        $date = new \DateTime();
        $date->setTimestamp($timeStamp);
        return $date->format("m");
    }

    public function getDay($pdate) {
        $timeStamp = strtotime($pdate);
        $date = new \DateTime();
        $date->setTimestamp($timeStamp);
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
            ->select('s.id, s.descricao, s.codSerPref, s.valor, s.percIss, s.percIrrf, s.percCsl, s.percPis, s.percCofins')
            ->where('s.idEmpresa = :emp')
            ->andWhere('s.id = :idserv')
            ->setParameter('emp', $this->getEmpresa())
            ->setParameter('idserv', $idServico)
            ->getQuery();

        $result = $query->getArrayResult();

        return new JsonResponse($result);

    }    
}
