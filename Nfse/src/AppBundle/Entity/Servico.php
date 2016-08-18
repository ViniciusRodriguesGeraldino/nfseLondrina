<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servico
 *
 * @ORM\Table(name="servico")
 * @ORM\Entity
 */
class Servico
{
    /**
     * @var string
     *
     * @ORM\Column(name="DESCRICAO", type="string", length=250, nullable=true)
     */
    private $descricao;

    /**
     * @var float
     *
     * @ORM\Column(name="PERC_IRRF", type="float", precision=10, scale=0, nullable=true)
     */
    private $percIrrf;

    /**
     * @var float
     *
     * @ORM\Column(name="PERC_CSL", type="float", precision=10, scale=0, nullable=true)
     */
    private $percCsl;

    /**
     * @var float
     *
     * @ORM\Column(name="PERC_PIS", type="float", precision=10, scale=0, nullable=true)
     */
    private $percPis;

    /**
     * @var float
     *
     * @ORM\Column(name="PERC_COFINS", type="float", precision=10, scale=0, nullable=true)
     */
    private $percCofins;

    /**
     * @var float
     *
     * @ORM\Column(name="PERC_ISS", type="float", precision=10, scale=0, nullable=true)
     */
    private $percIss;

    /**
     * @var string
     *
     * @ORM\Column(name="PLANO", type="string", length=5, nullable=true)
     */
    private $plano;

    /**
     * @var string
     *
     * @ORM\Column(name="ISS_SUSPENSO", type="string", length=1, nullable=true)
     */
    private $issSuspenso;

    /**
     * @var string
     *
     * @ORM\Column(name="ISS_SUSPENSO_MOTIVO", type="string", length=100, nullable=true)
     */
    private $issSuspensoMotivo;

    /**
     * @var string
     *
     * @ORM\Column(name="COD_SER_PREF", type="string", length=10, nullable=true)
     */
    private $codSerPref;

    /**
     * @var float
     *
     * @ORM\Column(name="VALOR", type="float", precision=10, scale=0, nullable=true)
     */
    private $valor;

    /**
     * @var float
     *
     * @ORM\Column(name="IBPT_NAC", type="float", precision=10, scale=0, nullable=true)
     */
    private $ibptNac;

    /**
     * @var float
     *
     * @ORM\Column(name="IBPT_MUN", type="float", precision=10, scale=0, nullable=true)
     */
    private $ibptMun;

    /**
     * @var integer
     *
     * @ORM\Column(name="EMPRESA", type="integer", nullable=true)
     */
    private $idEmpresa;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Servico
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set percIrrf
     *
     * @param float $percIrrf
     *
     * @return Servico
     */
    public function setPercIrrf($percIrrf)
    {
        $this->percIrrf = $percIrrf;

        return $this;
    }

    /**
     * Get percIrrf
     *
     * @return float
     */
    public function getPercIrrf()
    {
        return $this->percIrrf;
    }

    /**
     * Set percCsl
     *
     * @param float $percCsl
     *
     * @return Servico
     */
    public function setPercCsl($percCsl)
    {
        $this->percCsl = $percCsl;

        return $this;
    }

    /**
     * Get percCsl
     *
     * @return float
     */
    public function getPercCsl()
    {
        return $this->percCsl;
    }

    /**
     * Set percPis
     *
     * @param float $percPis
     *
     * @return Servico
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
     * Set percCofins
     *
     * @param float $percCofins
     *
     * @return Servico
     */
    public function setPercCofins($percCofins)
    {
        $this->percCofins = $percCofins;

        return $this;
    }

    /**
     * Get percCofins
     *
     * @return float
     */
    public function getPercCofins()
    {
        return $this->percCofins;
    }

    /**
     * Set percIss
     *
     * @param float $percIss
     *
     * @return Servico
     */
    public function setPercIss($percIss)
    {
        $this->percIss = $percIss;

        return $this;
    }

    /**
     * Get percIss
     *
     * @return float
     */
    public function getPercIss()
    {
        return $this->percIss;
    }

    /**
     * Set plano
     *
     * @param string $plano
     *
     * @return Servico
     */
    public function setPlano($plano)
    {
        $this->plano = $plano;

        return $this;
    }

    /**
     * Get plano
     *
     * @return string
     */
    public function getPlano()
    {
        return $this->plano;
    }

    /**
     * Set issSuspenso
     *
     * @param string $issSuspenso
     *
     * @return Servico
     */
    public function setIssSuspenso($issSuspenso)
    {
        $this->issSuspenso = $issSuspenso;

        return $this;
    }

    /**
     * Get issSuspenso
     *
     * @return string
     */
    public function getIssSuspenso()
    {
        return $this->issSuspenso;
    }

    /**
     * Set issSuspensoMotivo
     *
     * @param string $issSuspensoMotivo
     *
     * @return Servico
     */
    public function setIssSuspensoMotivo($issSuspensoMotivo)
    {
        $this->issSuspensoMotivo = $issSuspensoMotivo;

        return $this;
    }

    /**
     * Get issSuspensoMotivo
     *
     * @return string
     */
    public function getIssSuspensoMotivo()
    {
        return $this->issSuspensoMotivo;
    }

    /**
     * Set codSerPref
     *
     * @param string $codSerPref
     *
     * @return Servico
     */
    public function setCodSerPref($codSerPref)
    {
        $this->codSerPref = $codSerPref;

        return $this;
    }

    /**
     * Get codSerPref
     *
     * @return string
     */
    public function getCodSerPref()
    {
        return $this->codSerPref;
    }

    /**
     * Set valor
     *
     * @param float $valor
     *
     * @return Servico
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
     * Set ibptNac
     *
     * @param float $ibptNac
     *
     * @return Servico
     */
    public function setIbptNac($ibptNac)
    {
        $this->ibptNac = $ibptNac;

        return $this;
    }

    /**
     * Get ibptNac
     *
     * @return float
     */
    public function getIbptNac()
    {
        return $this->ibptNac;
    }

    /**
     * Set ibptMun
     *
     * @param float $ibptMun
     *
     * @return Servico
     */
    public function setIbptMun($ibptMun)
    {
        $this->ibptMun = $ibptMun;

        return $this;
    }

    /**
     * Get ibptMun
     *
     * @return float
     */
    public function getIbptMun()
    {
        return $this->ibptMun;
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


    /**
     * Get idEmpresa
     *
     * @return integer
     */
    public function getIdEmpresa()
    {
        return $this->id;
    }

    /**
     * Set idEmpresa
     *
     * @param integer $idEmpresa
     *
     * @return Servico
     */
    public function setidEmpresa($idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;

        return $this;
    }


}
