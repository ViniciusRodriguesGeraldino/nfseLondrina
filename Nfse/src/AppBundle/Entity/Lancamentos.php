<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lancamentos
 *
 * @ORM\Table(name="lancamentos")
 * @ORM\Entity
 */
class Lancamentos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="EMPRESA", type="integer", nullable=false)
     */
    private $empresa;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_DOC", type="integer", nullable=false)
     */
    private $iddoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NUMERODOC", type="integer", nullable=false)
     */
    private $numerodoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_CLIENTE", type="integer", nullable=false)
     */
    private $idcliente;


    /**
     * @var float
     *
     * @ORM\Column(name="VALOR", type="float", precision=10, scale=0, nullable=true)
     */
    private $valor;

    /**
     * @var float
     *
     * @ORM\Column(name="ACRESCIMOS", type="float", precision=10, scale=0, nullable=true)
     */
    private $acrescimos;
    /**
     * @var float
     *
     * @ORM\Column(name="DESCONTOS", type="float", precision=10, scale=0, nullable=true)
     */
    private $descontos;

    /**
     * @var string
     *
     * @ORM\Column(name="TIPOLANC", type="string", length=10, nullable=true)
     */
    private $tipolanc;

    /**
     * @var date
     *
     * @ORM\Column(name="DATA_LANCAMENTO", type="date", nullable=true)
     */
    private $datalancamento;

    /**
     * @var date
     *
     * @ORM\Column(name="DATA_VENCIMENTO", type="date", nullable=true)
     */
    private $datavencimento;

    /**
     * @var string
     *
     * @ORM\Column(name="HISTORICO", type="string", length=10, nullable=true)
     */
    private $historico;

    /**
     * @var integer
     *
     * @ORM\Column(name="CREDITO", type="integer", nullable=false)
     */
    private $credito;


    /**
     * @var integer
     *
     * @ORM\Column(name="DEBITO", type="integer", nullable=false)
     */
    private $debito;

    /**
     * @var integer
     *
     * @ORM\Column(name="BANCO", type="integer", nullable=false)
     */
    private $banco;

    /**
     * @var string
     *
     * @ORM\Column(name="CENTRO_CUSTO", type="integer", nullable=false)
     */
    private $centrocusto;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set empresa
     *
     * @param integer $empresa
     *
     * @return Lancamentos
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
     * Set iddoc
     *
     * @param integer $iddoc
     *
     * @return Lancamentos
     */
    public function setIddoc($iddoc)
    {
        $this->iddoc = $iddoc;

        return $this;
    }

    /**
     * Get iddoc
     *
     * @return integer
     */
    public function getIddoc()
    {
        return $this->iddoc;
    }

    /**
     * Set numerodoc
     *
     * @param integer $numerodoc
     *
     * @return Lancamentos
     */
    public function setNumerodoc($numerodoc)
    {
        $this->numerodoc = $numerodoc;

        return $this;
    }

    /**
     * Get numerodoc
     *
     * @return integer
     */
    public function getNumerodoc()
    {
        return $this->numerodoc;
    }

    /**
     * Set idcliente
     *
     * @param integer $idcliente
     *
     * @return Lancamentos
     */
    public function setIdcliente($idcliente)
    {
        $this->idcliente = $idcliente;

        return $this;
    }

    /**
     * Get idcliente
     *
     * @return integer
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * Set valor
     *
     * @param float $valor
     *
     * @return Lancamentos
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set acrescimos
     *
     * @param float $acrescimos
     *
     * @return Lancamentos
     */
    public function setAcrescimos($acrescimos)
    {
        $this->acrescimos = $acrescimos;

        return $this;
    }

    /**
     * Get acrescimos
     *
     * @return float
     */
    public function getAcrescimos()
    {
        return $this->acrescimos;
    }

    /**
     * Set descontos
     *
     * @param float $descontos
     *
     * @return Lancamentos
     */
    public function setDescontos($descontos)
    {
        $this->descontos = $descontos;

        return $this;
    }

    /**
     * Get descontos
     *
     * @return float
     */
    public function getDescontos()
    {
        return $this->descontos;
    }

    /**
     * Set datalancamento
     *
     * @param date $datalancamento
     *
     * @return Lancamentos
     */
    public function setDataLancamento($datalancamento)
    {
        $this->datalancamento = $datalancamento;

        return $this;
    }

    /**
     * Get datalancamento
     *
     * @return \DateTime
     */
    public function getDataLancamento()
    {
        return $this->datalancamento;
    }


    /**
     * Set datavencimento
     *
     * @param date $datavencimento
     *
     * @return Lancamentos
     */
    public function setDataVencimento($datavencimento)
    {
        $this->datavencimento = $datavencimento;

        return $this;
    }

    /**
     * Get datavencimento
     *
     * @return \DateTime
     */
    public function getDataVencimento()
    {
        return $this->datavencimento;
    }

    /**
     * Set historico
     *
     * @param string $historico
     *
     * @return Lancamentos
     */
    public function setHistorico($historico)
    {
        $this->historico = $historico;

        return $this;
    }

    /**
     * Get historico
     *
     * @return string
     */
    public function getHistorico()
    {
        return $this->historico;
    }

    /**
     * Set centrocusto
     *
     * @param string $centrocusto
     *
     * @return Lancamentos
     */
    public function setCentroCusto($centrocusto)
    {
        $this->centrocusto = $centrocusto;

        return $this;
    }

    /**
     * Get centrocusto
     *
     * @return string
     */
    public function getCentroCusto()
    {
        return $this->centrocusto;
    }

    /**
     * Set credito
     *
     * @param integer $credito
     *
     * @return Lancamentos
     */
    public function setCredito($credito)
    {
        $this->credito = $credito;

        return $this;
    }

    /**
     * Get credito
     *
     * @return integer
     */
    public function getCredito()
    {
        return $this->credito;
    }

    /**
     * Set debito
     *
     * @param integer $debito
     *
     * @return Lancamentos
     */
    public function setDebito($debito)
    {
        $this->debito = $debito;

        return $this;
    }

    /**
     * Get debito
     *
     * @return integer
     */
    public function getDebito()
    {
        return $this->debito;
    }

    /**
     * Set banco
     *
     * @param integer $banco
     *
     * @return Lancamentos
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;

        return $this;
    }

    /**
     * Get banco
     *
     * @return integer
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * Set tipolanc
     *
     * @param string $tipolanc
     *
     * @return Lancamentos
     */
    public function setTipoLanc($tipolanc){
        $this->tipolanc = $tipolanc;

        return $this;
    }

    /**
     * Get tipolanc
     *
     * @return string
     */
    public function getTipoLanc()
    {
        return $this->tipolanc;
    }

}
