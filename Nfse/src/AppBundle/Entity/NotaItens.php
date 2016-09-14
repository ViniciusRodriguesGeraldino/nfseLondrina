<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NotaItens
 *
 * @ORM\Table(name="nota_itens")
 * @ORM\Entity
 */
class NotaItens
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_NOTA", type="integer")
     *
     */
    private $idNota;

    /**
     * @var integer
     *
     * @ORM\Column(name="COD_SERVICO", type="integer")
     *
     */
    private $codServico;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRICAO", type="string", length=40, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="QUANTIDADE", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $quantidade;

    /**
     * @var string
     *
     * @ORM\Column(name="VALOR", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCONTO", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $desconto;

    /**
     * @var string
     *
     * @ORM\Column(name="VALORISS", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $valorIss;

    /**
     * @var string
     *
     * @ORM\Column(name="PERCISS", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $percIss;


    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return NotaItens
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
     * Set valor
     *
     * @param string $valor
     *
     * @return NotaItens
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set idNota
     *
     * @param integer $idNota
     *
     * @return NotaItens
     */
    public function setIdNota($idNota)
    {
        $this->idNota = $idNota;

        return $this;
    }

    /**
     * Get idNota
     *
     * @return integer
     */
    public function getIdNota()
    {
        return $this->idNota;
    }

    /**
     * Set codServico
     *
     * @param integer $codServico
     *
     * @return NotaItens
     */
    public function setCodServico($codServico)
    {
        $this->codServico = $codServico;

        return $this;
    }

    /**
     * Get codServico
     *
     * @return integer
     */
    public function getCodServico()
    {
        return $this->codServico;
    }

    /**
     * Set quantidade
     *
     * @param string $quantidade
     *
     * @return NotaItens
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return string
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set desconto
     *
     * @param string $desconto
     *
     * @return NotaItens
     */
    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;

        return $this;
    }

    /**
     * Get desconto
     *
     * @return string
     */
    public function getDesconto()
    {
        return $this->desconto;
    }

    /**
     * Set valorIss
     *
     * @param string $valorIss
     *
     * @return NotaItens
     */
    public function setValorIss($valorIss)
    {
        $this->valorIss = $valorIss;

        return $this;
    }

    /**
     * Get valorIss
     *
     * @return string
     */
    public function getValorIss()
    {
        return $this->valorIss;
    }

    /**
     * Set percIss
     *
     * @param string $percIss
     *
     * @return NotaItens
     */
    public function setPercIss($percIss)
    {
        $this->percIss = $percIss;

        return $this;
    }

    /**
     * Get percIss
     *
     * @return string
     */
    public function getPercIss()
    {
        return $this->percIss;
    }
}
