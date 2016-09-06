<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nota
 *
 * @ORM\Table(name="nota")
 * @ORM\Entity
 */
class Nota
{
    /**
     * @var integer
     *
     * @ORM\Column(name="EMPRESA", type="integer", nullable=true)
     */
    private $empresa;

    /**
     * @var integer
     *
     * @ORM\Column(name="NUMERO_NOTA", type="integer", nullable=true)
     */
    private $numeroNota;

    /**
     * @var integer
     *
     * @ORM\Column(name="CLIENTE", type="integer", nullable=true)
     */
    private $cliente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="VENCIMENTO", type="date", nullable=true)
     */
    private $vencimento;

    /**
     * @var date
     *
     * @ORM\Column(name="DATA", type="date", nullable=true)
     */
    private $data;

    /**
     * @var integer
     *
     * @ORM\Column(name="MES", type="integer", nullable=true)
     */
    private $mes;

    /**
     * @var integer
     *
     * @ORM\Column(name="ANO", type="integer", nullable=true)
     */
    private $ano;

    /**
     * @var string
     *
     * @ORM\Column(name="CANCELADA", type="string", length=1, nullable=true)
     */
    private $cancelada;

    /**
     * @var string
     *
     * @ORM\Column(name="MOTIVO", type="string", length=30, nullable=true)
     */
    private $motivo;

    /**
     * @var float
     *
     * @ORM\Column(name="PERC_PIS", type="float", precision=10, scale=0, nullable=true)
     */
    private $percPis;

    /**
     * @var float
     *
     * @ORM\Column(name="PIS", type="float", precision=10, scale=0, nullable=true)
     */
    private $pis;

    /**
     * @var float
     *
     * @ORM\Column(name="CSL", type="float", precision=10, scale=0, nullable=true)
     */
    private $csl;

    /**
     * @var float
     *
     * @ORM\Column(name="COFINS", type="float", precision=10, scale=0, nullable=true)
     */
    private $cofins;

    /**
     * @var float
     *
     * @ORM\Column(name="INSS", type="float", precision=10, scale=0, nullable=true)
     */
    private $inss;

    /**
     * @var float
     *
     * @ORM\Column(name="ISS", type="float", precision=10, scale=0, nullable=true)
     */
    private $iss;

    /**
     * @var float
     *
     * @ORM\Column(name="ISS_RETIDO", type="float", precision=10, scale=0, nullable=true)
     */
    private $issRetido;

    /**
     * @var float
     *
     * @ORM\Column(name="BASE_ISS", type="float", precision=10, scale=0, nullable=true)
     */
    private $baseIss;

    /**
     * @var float
     *
     * @ORM\Column(name="DESCONTO", type="float", precision=10, scale=0, nullable=true)
     */
    private $desconto;

    /**
     * @var float
     *
     * @ORM\Column(name="TOTAL", type="float", precision=10, scale=0, nullable=true)
     */
    private $total;

    /**
     * @var float
     *
     * @ORM\Column(name="IRRF", type="float", precision=10, scale=0, nullable=true)
     */
    private $irrf;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_FATURAMENTO", type="integer", nullable=true)
     */
    private $idFaturamento;

    /**
     * @var float
     *
     * @ORM\Column(name="TOTAL_BRUTO", type="float", precision=10, scale=0, nullable=true)
     */
    private $totalBruto;

    /**
     * @var string
     *
     * @ORM\Column(name="TIPO_NOTA", type="string", length=1, nullable=true)
     */
    private $tipoNota;

    /**
     * @var float
     *
     * @ORM\Column(name="IRRF_ORIG", type="float", precision=10, scale=0, nullable=true)
     */
    private $irrfOrig;

    /**
     * @var float
     *
     * @ORM\Column(name="PIS_ORIG", type="float", precision=10, scale=0, nullable=true)
     */
    private $pisOrig;

    /**
     * @var float
     *
     * @ORM\Column(name="CSL_ORIG", type="float", precision=10, scale=0, nullable=true)
     */
    private $cslOrig;

    /**
     * @var float
     *
     * @ORM\Column(name="COFINS_ORIG", type="float", precision=10, scale=0, nullable=true)
     */
    private $cofinsOrig;

    /**
     * @var float
     *
     * @ORM\Column(name="INSS_ORIG", type="float", precision=10, scale=0, nullable=true)
     */
    private $inssOrig;

    /**
     * @var float
     *
     * @ORM\Column(name="ISS_ORIG", type="float", precision=10, scale=0, nullable=true)
     */
    private $issOrig;

    /**
     * @var float
     *
     * @ORM\Column(name="ISS_RETIDO_ORIG", type="float", precision=10, scale=0, nullable=true)
     */
    private $issRetidoOrig;

    /**
     * @var integer
     *
     * @ORM\Column(name="NUMERO_NOTA_SUBSTITUTIVA", type="integer", nullable=true)
     */
    private $numeroNotaSubstitutiva;

    /**
     * @var string
     *
     * @ORM\Column(name="AUTENTICIDADE", type="string", length=100, nullable=true)
     */
    private $autenticidade;

    /**
     * @var string
     *
     * @ORM\Column(name="LINKIMPRESSAO", type="string", length=250, nullable=true)
     */
    private $linkimpressao;

    /**
     * @var string
     *
     * @ORM\Column(name="AUTENTICIDADE_CANCELAMENTO", type="string", length=100, nullable=true)
     */
    private $autenticidadeCancelamento;

    /**
     * @var string
     *
     * @ORM\Column(name="LINKIMPRESSAO_CANCELAMENTO", type="string", length=250, nullable=true)
     */
    private $linkimpressaoCancelamento;

    /**
     * @var string
     *
     * @ORM\Column(name="OBSERVACAO", type="string", length=255, nullable=true)
     */
    private $observacao;

    /**
     * @var string
     *
     * @ORM\Column(name="STATUS", type="string", length=20, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="FORMAPAGAMENTO", type="string", length=20, nullable=true)
     */
    private $formapagamento;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set empresa
     *
     * @param integer $empresa
     *
     * @return Nota
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return integer
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set numeroNota
     *
     * @param integer $numeroNota
     *
     * @return Nota
     */
    public function setNumeroNota($numeroNota)
    {
        $this->numeroNota = $numeroNota;

        return $this;
    }

    /**
     * Get numeroNota
     *
     * @return integer
     */
    public function getNumeroNota()
    {
        return $this->numeroNota;
    }

    /**
     * Set cliente
     *
     * @param integer $cliente
     *
     * @return Nota
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return integer
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set data
     *
     * @param date $data
     *
     * @return Nota
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set mes
     *
     * @param integer $mes
     *
     * @return Nota
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return integer
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set ano
     *
     * @param integer $ano
     *
     * @return Nota
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get ano
     *
     * @return integer
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set cancelada
     *
     * @param string $cancelada
     *
     * @return Nota
     */
    public function setCancelada($cancelada)
    {
        $this->cancelada = $cancelada;

        return $this;
    }

    /**
     * Get cancelada
     *
     * @return string
     */
    public function getCancelada()
    {
        return $this->cancelada;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     *
     * @return Nota
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set percPis
     *
     * @param float $percPis
     *
     * @return Nota
     */
    public function setPercPis($percPis)
    {
        $this->percPis = $percPis;

        return $this;
    }

    /**
     * Get percPis
     *
     * @return float
     */
    public function getPercPis()
    {
        return $this->percPis;
    }

    /**
     * Set pis
     *
     * @param float $pis
     *
     * @return Nota
     */
    public function setPis($pis)
    {
        $this->pis = $pis;

        return $this;
    }

    /**
     * Get pis
     *
     * @return float
     */
    public function getPis()
    {
        return $this->pis;
    }

    /**
     * Set csl
     *
     * @param float $csl
     *
     * @return Nota
     */
    public function setCsl($csl)
    {
        $this->csl = $csl;

        return $this;
    }

    /**
     * Get csl
     *
     * @return float
     */
    public function getCsl()
    {
        return $this->csl;
    }

    /**
     * Set cofins
     *
     * @param float $cofins
     *
     * @return Nota
     */
    public function setCofins($cofins)
    {
        $this->cofins = $cofins;

        return $this;
    }

    /**
     * Get cofins
     *
     * @return float
     */
    public function getCofins()
    {
        return $this->cofins;
    }

    /**
     * Set inss
     *
     * @param float $inss
     *
     * @return Nota
     */
    public function setInss($inss)
    {
        $this->inss = $inss;

        return $this;
    }

    /**
     * Get inss
     *
     * @return float
     */
    public function getInss()
    {
        return $this->inss;
    }

    /**
     * Set iss
     *
     * @param float $iss
     *
     * @return Nota
     */
    public function setIss($iss)
    {
        $this->iss = $iss;

        return $this;
    }

    /**
     * Get iss
     *
     * @return float
     */
    public function getIss()
    {
        return $this->iss;
    }

    /**
     * Set issRetido
     *
     * @param float $issRetido
     *
     * @return Nota
     */
    public function setIssRetido($issRetido)
    {
        $this->issRetido = $issRetido;

        return $this;
    }

    /**
     * Get issRetido
     *
     * @return float
     */
    public function getIssRetido()
    {
        return $this->issRetido;
    }

    /**
     * Set baseIss
     *
     * @param float $baseIss
     *
     * @return Nota
     */
    public function setBaseIss($baseIss)
    {
        $this->baseIss = $baseIss;

        return $this;
    }

    /**
     * Get baseIss
     *
     * @return float
     */
    public function getBaseIss()
    {
        return $this->baseIss;
    }

    /**
     * Set desconto
     *
     * @param float $desconto
     *
     * @return Nota
     */
    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;

        return $this;
    }

    /**
     * Get desconto
     *
     * @return float
     */
    public function getDesconto()
    {
        return $this->desconto;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Nota
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set irrf
     *
     * @param float $irrf
     *
     * @return Nota
     */
    public function setIrrf($irrf)
    {
        $this->irrf = $irrf;

        return $this;
    }

    /**
     * Get irrf
     *
     * @return float
     */
    public function getIrrf()
    {
        return $this->irrf;
    }

    /**
     * Set idFaturamento
     *
     * @param integer $idFaturamento
     *
     * @return Nota
     */
    public function setIdFaturamento($idFaturamento)
    {
        $this->idFaturamento = $idFaturamento;

        return $this;
    }

    /**
     * Get idFaturamento
     *
     * @return integer
     */
    public function getIdFaturamento()
    {
        return $this->idFaturamento;
    }

    /**
     * Set totalBruto
     *
     * @param float $totalBruto
     *
     * @return Nota
     */
    public function setTotalBruto($totalBruto)
    {
        $this->totalBruto = $totalBruto;

        return $this;
    }

    /**
     * Get totalBruto
     *
     * @return float
     */
    public function getTotalBruto()
    {
        return $this->totalBruto;
    }

    /**
     * Set tipoNota
     *
     * @param string $tipoNota
     *
     * @return Nota
     */
    public function setTipoNota($tipoNota)
    {
        $this->tipoNota = $tipoNota;

        return $this;
    }

    /**
     * Get tipoNota
     *
     * @return string
     */
    public function getTipoNota()
    {
        return $this->tipoNota;
    }

    /**
     * Set irrfOrig
     *
     * @param float $irrfOrig
     *
     * @return Nota
     */
    public function setIrrfOrig($irrfOrig)
    {
        $this->irrfOrig = $irrfOrig;

        return $this;
    }

    /**
     * Get irrfOrig
     *
     * @return float
     */
    public function getIrrfOrig()
    {
        return $this->irrfOrig;
    }

    /**
     * Set pisOrig
     *
     * @param float $pisOrig
     *
     * @return Nota
     */
    public function setPisOrig($pisOrig)
    {
        $this->pisOrig = $pisOrig;

        return $this;
    }

    /**
     * Get pisOrig
     *
     * @return float
     */
    public function getPisOrig()
    {
        return $this->pisOrig;
    }

    /**
     * Set cslOrig
     *
     * @param float $cslOrig
     *
     * @return Nota
     */
    public function setCslOrig($cslOrig)
    {
        $this->cslOrig = $cslOrig;

        return $this;
    }

    /**
     * Get cslOrig
     *
     * @return float
     */
    public function getCslOrig()
    {
        return $this->cslOrig;
    }

    /**
     * Set cofinsOrig
     *
     * @param float $cofinsOrig
     *
     * @return Nota
     */
    public function setCofinsOrig($cofinsOrig)
    {
        $this->cofinsOrig = $cofinsOrig;

        return $this;
    }

    /**
     * Get cofinsOrig
     *
     * @return float
     */
    public function getCofinsOrig()
    {
        return $this->cofinsOrig;
    }

    /**
     * Set inssOrig
     *
     * @param float $inssOrig
     *
     * @return Nota
     */
    public function setInssOrig($inssOrig)
    {
        $this->inssOrig = $inssOrig;

        return $this;
    }

    /**
     * Get inssOrig
     *
     * @return float
     */
    public function getInssOrig()
    {
        return $this->inssOrig;
    }

    /**
     * Set issOrig
     *
     * @param float $issOrig
     *
     * @return Nota
     */
    public function setIssOrig($issOrig)
    {
        $this->issOrig = $issOrig;

        return $this;
    }

    /**
     * Get issOrig
     *
     * @return float
     */
    public function getIssOrig()
    {
        return $this->issOrig;
    }

    /**
     * Set issRetidoOrig
     *
     * @param float $issRetidoOrig
     *
     * @return Nota
     */
    public function setIssRetidoOrig($issRetidoOrig)
    {
        $this->issRetidoOrig = $issRetidoOrig;

        return $this;
    }

    /**
     * Get issRetidoOrig
     *
     * @return float
     */
    public function getIssRetidoOrig()
    {
        return $this->issRetidoOrig;
    }

    /**
     * Set numeroNotaSubstitutiva
     *
     * @param integer $numeroNotaSubstitutiva
     *
     * @return Nota
     */
    public function setNumeroNotaSubstitutiva($numeroNotaSubstitutiva)
    {
        $this->numeroNotaSubstitutiva = $numeroNotaSubstitutiva;

        return $this;
    }

    /**
     * Get numeroNotaSubstitutiva
     *
     * @return integer
     */
    public function getNumeroNotaSubstitutiva()
    {
        return $this->numeroNotaSubstitutiva;
    }

    /**
     * Set autenticidade
     *
     * @param string $autenticidade
     *
     * @return Nota
     */
    public function setAutenticidade($autenticidade)
    {
        $this->autenticidade = $autenticidade;

        return $this;
    }

    /**
     * Get autenticidade
     *
     * @return string
     */
    public function getAutenticidade()
    {
        return $this->autenticidade;
    }

    /**
     * Set linkimpressao
     *
     * @param string $linkimpressao
     *
     * @return Nota
     */
    public function setLinkimpressao($linkimpressao)
    {
        $this->linkimpressao = $linkimpressao;

        return $this;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     *
     * @return Nota
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Nota
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set formapagamento
     *
     * @param string $formapagamento
     *
     * @return Nota
     */
    public function setFormapagamento($formapagamento)
    {
        $this->formapagamento = $formapagamento;

        return $this;
    }

    /**
     * Get linkimpressao
     *
     * @return string
     */
    public function getLinkimpressao()
    {
        return $this->linkimpressao;
    }

    /**
     * Set autenticidadeCancelamento
     *
     * @param string $autenticidadeCancelamento
     *
     * @return Nota
     */
    public function setAutenticidadeCancelamento($autenticidadeCancelamento)
    {
        $this->autenticidadeCancelamento = $autenticidadeCancelamento;

        return $this;
    }

    /**
     * Get autenticidadeCancelamento
     *
     * @return string
     */
    public function getAutenticidadeCancelamento()
    {
        return $this->autenticidadeCancelamento;
    }

    /**
     * Set linkimpressaoCancelamento
     *
     * @param string $linkimpressaoCancelamento
     *
     * @return Nota
     */
    public function setLinkimpressaoCancelamento($linkimpressaoCancelamento)
    {
        $this->linkimpressaoCancelamento = $linkimpressaoCancelamento;

        return $this;
    }

    /**
     * Get linkimpressaoCancelamento
     *
     * @return string
     */
    public function getLinkimpressaoCancelamento()
    {
        return $this->linkimpressaoCancelamento;
    }


    /**
     * Get observacao
     *
     * @return string
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get formapagamento
     *
     * @return string
     */
    public function getFormapagamento()
    {
        return $this->formapagamento;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
