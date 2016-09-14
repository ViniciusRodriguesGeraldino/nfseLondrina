<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Lancamentos;

/**
 * LancamentosController.
 *
 */
class LancamentosController extends Controller
{

    public function gravaLancamento($idDocumento, $numeroDocumento, $idCliente, $valorDocumento, $acrescimos, $descontos,
                                    $tipoLancamento, $dataVencimento, $historico, $debito, $credito, $banco, $centroCusto)
    {
        $lancamento = new Lancamentos();

        $lancamento->setEmpresa($this->get('app.emp')->getIdEmpresa());
        $lancamento->setIddoc($idDocumento);
        $lancamento->setNumerodoc($numeroDocumento);
        $lancamento->setIdcliente($idCliente);
        $lancamento->setValor($valorDocumento);
        $lancamento->setAcrescimos($acrescimos);
        $lancamento->setDescontos($descontos);
        $lancamento->setTipoLanc($tipoLancamento);
        $lancamento->setDataLancamento(new \DateTime(date('Y-m-d')));
        $lancamento->setDataVencimento($dataVencimento);
        $lancamento->setHistorico($historico);
        $lancamento->setDebito($debito);
        $lancamento->setCredito($credito);
        $lancamento->setBanco($banco);
        $lancamento->setCentroCusto($centroCusto);

        $em = $this->getDoctrine()->getManager();
        $em->persist($lancamento);
        $em->flush();

    }

}
