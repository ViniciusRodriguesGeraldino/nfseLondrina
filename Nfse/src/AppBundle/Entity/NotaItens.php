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
     * @var string
     *
     * @ORM\Column(name="DESCRICAO", type="string", length=40, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="VALOR", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $valor;

    /**
     * @var integer
     *
     * @ORM\Column(name="ITEM", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $item;

    /**
     * @var integer
     *
     * @ORM\Column(name="NUMERONF", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeronf;



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
     * Set item
     *
     * @param integer $item
     *
     * @return NotaItens
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return integer
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set numeronf
     *
     * @param integer $numeronf
     *
     * @return NotaItens
     */
    public function setNumeronf($numeronf)
    {
        $this->numeronf = $numeronf;

        return $this;
    }

    /**
     * Get numeronf
     *
     * @return integer
     */
    public function getNumeronf()
    {
        return $this->numeronf;
    }
}
