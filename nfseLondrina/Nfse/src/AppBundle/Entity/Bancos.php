<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bancos
 *
 * @ORM\Table(name="bancos")
 * @ORM\Entity
 */
class Bancos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="EMPRESA", type="integer", nullable=false)
     */
    private $empresa;

    /**
     * @var integer
     *
     * @ORM\Column(name="BANCO", type="integer", nullable=true)
     */
    private $banco;

    /**
     * @var string
     *
     * @ORM\Column(name="NUMERO", type="string", length=5, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=30, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="AGENCIA", type="string", length=10, nullable=true)
     */
    private $agencia;

    /**
     * @var string
     *
     * @ORM\Column(name="DV_AGENCIA", type="string", length=1, nullable=true)
     */
    private $dvAgencia;

    /**
     * @var string
     *
     * @ORM\Column(name="CC", type="string", length=10, nullable=true)
     */
    private $cc;

    /**
     * @var string
     *
     * @ORM\Column(name="DV_CC", type="string", length=1, nullable=true)
     */
    private $dvCc;

    /**
     * @var string
     *
     * @ORM\Column(name="CARTEIRA", type="string", length=5, nullable=true)
     */
    private $carteira;

    /**
     * @var string
     *
     * @ORM\Column(name="CAIXA_BANCO", type="string", length=1, nullable=true)
     */
    private $caixaBanco;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_BANCO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBanco;



    /**
     * Set empresa
     *
     * @param integer $empresa
     *
     * @return Bancos
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
     * Set banco
     *
     * @param integer $banco
     *
     * @return Bancos
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
     * Set numero
     *
     * @param string $numero
     *
     * @return Bancos
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Bancos
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set agencia
     *
     * @param string $agencia
     *
     * @return Bancos
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;

        return $this;
    }

    /**
     * Get agencia
     *
     * @return string
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * Set dvAgencia
     *
     * @param string $dvAgencia
     *
     * @return Bancos
     */
    public function setDvAgencia($dvAgencia)
    {
        $this->dvAgencia = $dvAgencia;

        return $this;
    }

    /**
     * Get dvAgencia
     *
     * @return string
     */
    public function getDvAgencia()
    {
        return $this->dvAgencia;
    }

    /**
     * Set cc
     *
     * @param string $cc
     *
     * @return Bancos
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * Get cc
     *
     * @return string
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Set dvCc
     *
     * @param string $dvCc
     *
     * @return Bancos
     */
    public function setDvCc($dvCc)
    {
        $this->dvCc = $dvCc;

        return $this;
    }

    /**
     * Get dvCc
     *
     * @return string
     */
    public function getDvCc()
    {
        return $this->dvCc;
    }

    /**
     * Set carteira
     *
     * @param string $carteira
     *
     * @return Bancos
     */
    public function setCarteira($carteira)
    {
        $this->carteira = $carteira;

        return $this;
    }

    /**
     * Get carteira
     *
     * @return string
     */
    public function getCarteira()
    {
        return $this->carteira;
    }

    /**
     * Set caixaBanco
     *
     * @param string $caixaBanco
     *
     * @return Bancos
     */
    public function setCaixaBanco($caixaBanco)
    {
        $this->caixaBanco = $caixaBanco;

        return $this;
    }

    /**
     * Get caixaBanco
     *
     * @return string
     */
    public function getCaixaBanco()
    {
        return $this->caixaBanco;
    }

    /**
     * Get idBanco
     *
     * @return integer
     */
    public function getIdBanco()
    {
        return $this->idBanco;
    }
}
