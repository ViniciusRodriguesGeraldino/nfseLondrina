<?php

namespace AppBundle\Controller;

use AppBundle\Entity\NotaItens;
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
        $idEmp = $this->get('app.emp')->getIdEmpresa();

        $em = $this->getDoctrine()->getManager();

        $qb = $em->createQueryBuilder();
        $qb ->select('n.id, n.numeroNota, n.data, n.status, n.total', 'c.nome')
            ->from('AppBundle:Nota', 'n')
            ->leftJoin('AppBundle:Cliente', 'c', \Doctrine\ORM\Query\Expr\Join::WITH, 'n.cliente = c.id')
            ->where('n.empresa = :emp')
            ->setParameter('emp', $idEmp)
            ->orderBy('n.numeroNota', 'DESC');

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

        $id         = $this->getNewId();
        $data       = date("d/m/Y");
        $clientes   = $em->createQueryBuilder()
            ->select('c.nome, c.cpfcnpj')
            ->from('AppBundle:Cliente', 'c')
            ->where('c.empresa = :empresa')->setParameter('empresa', $this->get('app.emp')->getIdEmpresa())
            ->getQuery();

        $formValues = [
            'idNota'     => $id,
            'data'       => $data,
            'clientes'   => $clientes

        ];

        return $this->render('nota/newnfse.html.twig', array(
            'formValues' => $formValues,
        ));
    }

    public function getNewId(){
        $em = $this->getDoctrine()->getManager();

        $highest_id = $em->createQueryBuilder()
            ->select('MAX(n.id)')
            ->from('AppBundle:Nota', 'n')
            ->where('n.empresa = :empresa')->setParameter('empresa', $this->get('app.emp')->getIdEmpresa())
            ->getQuery()
            ->getSingleScalarResult();

        if ($highest_id == '')
            $highest_id = 0;

        $highest_id += 1;

        return $highest_id;
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

        $cliente = $this->getCliente($notum->getCliente());

        $varCliente['nome'] = $cliente[0]['nome'].' ('.$this->formataCpfCnpj($cliente[0]['cpfcnpj']).')';

        return $this->render('nota/show.html.twig', array(
            'notum' => $notum,
            'cliente' => $varCliente,
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
        return false;

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
     * @Route("/SalvarNota", name="SalvarNota")
     * @Method({"POST"})
     */
    public function SalvarNota(Request $request){

        $nota = new Nota();

        $dados = $request->request->get('dados', null);
        $prods = $request->request->get('produtos', null);

        $totalISS = 0;
        $totalDescontos = 0;

        foreach ($prods as $prod){
            $totalISS += $prod[5];
            $totalDescontos += $prod[4];
        }

        $nota->setEmpresa($this->get('app.emp')->getIdEmpresa());

        $idAux = $dados[1]['value']; //Pega o id cliente aqui
        $pos = strpos($idAux, ')');
        $pos -= 1;
        $idAux2 = substr($idAux, 1, $pos );
        $idCliente = trim($idAux2[0]);
        $nota->setCliente($idCliente);

        die(var_dump($idCliente.'-'.$nota->getCliente()));

        $nota->setTotal($dados[22]['value']);
        $nota->setDesconto($totalDescontos);
        $nota->setTotalBruto($nota->getTotal()+$nota->getDesconto());
        $data = $dados[3]['value'];
        $nota->setData(new \DateTime(date('Y-m-d')));
        $nota->setAno($this->getYear($data));
        $nota->setMes($this->getMonth($data));

        $nota->setTipoNota('NFSE');
        $nota->setObservacao($dados[24]['value']);
        $nota->setFormapagamento($dados[23]['value']);
        $nota->setAutenticidade('');
        $nota->setNumeroNotaSubstitutiva('');
        $nota->setIdFaturamento('');

//        $nota->setPercPis();
        $nota->setPis($dados[16]['value']);
//        $nota->setPisOrig();
//
        $nota->setCsl($dados[15]['value']);
//        $nota->setCslOrig();
//
        $nota->setCofins($dados[18]['value']);
//        $nota->setCofinsOrig();
//
        $nota->setInss($dados[19]['value']);
//        $nota->setInssOrig();
//
        $nota->setIss($totalISS);
//        $nota->setIssOrig();
        $nota->setIssRetido($dados[14]['value']);
//        $nota->setIssRetidoOrig();
        $nota->setBaseIss($dados[20]['value']);
//
        $nota->setIrrf($dados[17]['value']);
//        $nota->setIrrfOrig();

        $em = $this->getDoctrine()->getManager();
        $em->persist($nota);
        $em->flush();

        foreach ($prods as $prod){

            $itemNota = new NotaItens();

            $itemNota->setIdNota($nota->getId());
            $itemNota->setCodServico($prod[0]);
            $itemNota->setDescricao($prod[1]);
            $itemNota->setQuantidade($prod[2]);
            $itemNota->setValor($prod[3]);
            $itemNota->setDesconto($prod[4]);
            $itemNota->setValorIss($prod[5]);
            $itemNota->setPercIss($prod[6]);

            $ema = $this->getDoctrine()->getManager();
            $ema->persist($itemNota);
            $ema->flush();
            $ema->clear();
        }

        //Transmite a nota
        $retorno = $this->enviarNotaLondrina($nota->getId());
        $resultado     = $retorno['RetornoNota']->Resultado;

        if($resultado == 1){
            $nota->setNumeroNota($retorno['RetornoNota']->Nota);
            $nota->setAutenticidade($retorno['RetornoNota']->autenticidade);
            $nota->setLinkimpressao($retorno['RetornoNota']->LinkImpressao);
            $nota->setStatus('Enviada');

            $em = $this->getDoctrine()->getManager();
            $em->persist($nota);
            $em->flush();

            //Faz o lançamento da nota
            $historico = 'Nota Fiscal de Serviço Eletronica No. '.$nota->getNumeroNota();
            $this->get('app.emp')->gravaLancamento($nota->getId(), $nota->getNumeroNota(), $nota->getCliente(), $nota->getTotalBruto(),
                                    0, $nota->getDesconto(), 'NFSE', $nota->getData(), $historico, '', '', '', '');

            $array = json_decode(json_encode($retorno), True);

            $response['success'] = true;
            $response['retorno'] = $array;
            return new JsonResponse( $response );
        }else
        {
            $nota->setStatus('Não Enviada');
            $em = $this->getDoctrine()->getManager();
            $em->persist($nota);
            $em->flush();

            $itemsMsg = $retorno['Mensagens']->item;

            $msg = '';

            $arrayMsgs = (array)$itemsMsg; //Valida se o array tem o indice 0 ou o indice 'DescricaoErro' (gambis)

            if(array_key_exists('0', $arrayMsgs)){
                foreach ($itemsMsg as $items) {
                    $msg = $msg.' | '.$items->DescricaoErro;
                }
            }
            else{
                $msg = $itemsMsg->DescricaoErro;
            }

            $response['success']   = false;
            $response['mensagens'] = $msg;
            return new JsonResponse( $response );
        }
    }

    /**
     *
     * @Route("/reenviarNota", name="reenviarNota")
     * @Method({"POST"})
     */
    public function reenviarNota(Request $request){

        $id = $request->request->get('id', null);

        $retorno = $this->enviarNotaLondrina($id);
        $resultado     = $retorno['RetornoNota']->Resultado;

        $nota = new Nota();
        $em = $this->getDoctrine()->getManager();
        $nota = $em->getRepository('AppBundle:Nota')->find($id);

        if($resultado == 1){
            $nota->setNumeroNota($retorno['RetornoNota']->Nota);
            $nota->setAutenticidade($retorno['RetornoNota']->autenticidade);
            $nota->setLinkimpressao($retorno['RetornoNota']->LinkImpressao);
            $nota->setStatus('Enviada');

            $em = $this->getDoctrine()->getManager();
            $em->persist($nota);
            $em->flush();

            $array = json_decode(json_encode($retorno), True);

            $response['success'] = true;
            $response['retorno'] = $array;

            return new JsonResponse( $response );

        }else
        {
            $nota->setStatus('Não Enviada');
            $em = $this->getDoctrine()->getManager();
            $em->persist($nota);
            $em->flush();

            $itemsMsg = $retorno['Mensagens']->item;
            $msg = '';

            $arrayMsgs = (array)$itemsMsg; //Valida se o array tem o indice 0 ou o indice 'DescricaoErro' (gambis)

            if(array_key_exists('0', $arrayMsgs)){
                foreach ($itemsMsg as $items) {
                    $msg = $msg.' | '.$items->DescricaoErro;
                }
            }
            else{
                $msg = $itemsMsg->DescricaoErro;
            }

            $response['success']   = false;
            $response['mensagens'] = $msg;
            return new JsonResponse( $response );
        }
    }

    public function enviarNotaLondrina($id){

        $em = $this->getDoctrine()->getManager();
        $nota = $em->getRepository('AppBundle:Nota')->find($id);

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

        $soapClient = new \BeSimple\SoapClient\SoapClient($wsdl, array('trace' => 1));

        $cpfcnpj = $cliente[0]['cpfcnpj'];

        if (strlen($cpfcnpj) == 11)
            $tipoCliente = 2;
        elseif (strlen($cpfcnpj) > 11 && $cliente[0]['codCid'] == 4113700)
            $tipoCliente = 3;
        else
            $tipoCliente = 4;

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
        $gera->tomador_tipo                    = $tipoCliente; //const tomador_tipo: Integer; 1 – PFNI; 2 – Pessoa Física; 3 – Jurídica do Município; 4 – Jurídica de Fora; 5 – Jurídica de Fora do País
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

        $result = $soapClient->GerarNota($gera);
        //Ver o xml enviado.
        //return var_dump(htmlentities($SOAP->__getLastRequest()));

        return $result;
    }

    public function getEmpresaValues(){
        $id = $this->get('app.emp')->getIdEmpresa();

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
            ->setParameter('emp', $this->get('app.emp')->getIdEmpresa())
            ->setParameter('id', $id)
            ->getQuery();
        $result = $query->getResult();

        return $result;
    }

    public function getCliente($id) {

        $repo = $this->getDoctrine()
            ->getRepository('AppBundle:Cliente');
        $query = $repo->createQueryBuilder('c')
            ->select('c.nome, c.cpfcnpj, c.codCid, c.eMail, c.ie, c.endereco, c.complemento, c.numero, c.bairro, c.cep, c.fone')
            ->where('c.id = :val')
            ->andWhere('c.empresa = :emp')
            ->setParameter('val', $id)
            ->setParameter('emp', $this->get('app.emp')->getIdEmpresa())
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
            ->setParameter('emp', $this->get('app.emp')->getIdEmpresa())
            ->getQuery();
        $result = $query->getArrayResult();

        $ret2 = [];

        foreach ($result as $value) {
            $ret2[] = '('.$value['id'].') '.$value['nome'].' : '.$this->formataCpfCnpj($value['cpfcnpj']);
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
            ->setParameter('emp', $this->get('app.emp')->getIdEmpresa())
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
            ->setParameter('emp', $this->get('app.emp')->getIdEmpresa())
            ->setParameter('idserv', $idServico)
            ->getQuery();

        $result = $query->getArrayResult();

        return new JsonResponse($result);

    }

    /**
     *
     * @Route("/ImprimirNf", name="ImprimirNf")
     * @Method({"POST"})
     */
    public function ImprimirNf(Request $request){

        $id = $request->request->get('id', null);

        //$nota = new Nota();

        $em = $this->getDoctrine()->getManager();
        $nota = $em->getRepository('AppBundle:Nota')->find($id);

        if($nota->getCancelada() == 'S'){
            $url = $nota->getLinkimpressaoCancelamento();
        }else{
            $url = $nota->getLinkimpressao();
        }

        if($url != '') {
            $response['success'] = true;
            $response['url'] = $url;
        }else{
            $response['success'] = false;
            $response['url'] = '';
        }

        return new JsonResponse($response);
    }

    public function formataCpfCnpj($codigo){
        $mask = '';

        if($codigo.$length = 11){
            $mask = '###.###.###-##';
            return $this->Mask($mask, $codigo);
        }
        else if($codigo.$length = 14){
            $mask = '##.###.###/####-##';
            return $this->Mask($mask, $codigo);
        }
        else{
            return $codigo;
        }

    }

    function Mask($mask,$str){

        $str = str_replace(" ","",$str);

        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }

        return $mask;

    }


    /**
     *
     * @Route("/CancelarNf", name="CancelarNf")
     * @Method({"POST"})
     */
    public function CancelarNf(Request $request){

        $id = $request->request->get('id', null);
        $cod_cancelamento = $request->request->get('cod_cancelamento', null);

        $em = $this->getDoctrine()->getManager();
        $nota = $em->getRepository('AppBundle:Nota')->find($id);
        $cliente = $this->getCliente($nota->getCliente());

//        require_once '../../vendor/autoload.php';
        require_once 'C:\xampp\htdocs\NFSE\nfseLondrina\Nfse\vendor\autoload.php';

        $empresa = $this->getEmpresaValues();

        if($empresa[0]['producao'] == 'N') {
            $wsdl = 'http://testeiss.londrina.pr.gov.br/ws/v1_03/sigiss_ws.php?wsdl';
        }else{
            $wsdl = 'https://iss.londrina.pr.gov.br/ws/v1_03/sigiss_ws.php?wsdl';
        }

        $soapClient = new \BeSimple\SoapClient\SoapClient($wsdl, array('trace' => 1, "exception" => 0));

        $cancela = new \stdClass();

        $cancela->WSRetornoNota                   = ''; //out RetornoNota: tcRetornoNota;
        $cancela->WSDescErros                     = ''; //out Mensagens: tcListaErrosAlertas;
        $cancela->ccm                             = $empresa[0]['cmc']; //const ccm: Integer;
        $cancela->cnpj                            = $empresa[0]['cpfcnpj']; //const cnpj: String;
        $cancela->cpf                             = $empresa[0]['cpfPrefeitura']; //const cpf: String;
        $cancela->senha                           = $empresa[0]['senhaPrefeitura']; //const senha: String;
        $cancela->nota                            = $nota->getNumeroNota();
        $cancela->cod_cancelamento                = $cod_cancelamento; //2 – Serviço não prestado ou 4 - Duplicidade da nota
        $cancela->email                           = $cliente[0]['eMail'];

        $result = $soapClient->CancelarNota($cancela);

        $resultado     = $result['RetornoNota']->Resultado;


        if ($resultado == 1){
            $nota->setStatus('Cancelada');
            $nota->setLinkimpressaoCancelamento($result['RetornoNota']->LinkImpressao);
            $nota->setCancelada('S');
            $nota->setMotivo($cod_cancelamento == 2 ? '2 – Serviço não prestado' : '4 – Duplicidade da nota');

            $em = $this->getDoctrine()->getManager();
            $em->persist($nota);
            $em->flush();

            $response['success'] = true;

        }else{
            $response['success']   = false;
        }

        return new JsonResponse( $response );
    }
}
