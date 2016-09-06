<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plano
 *
 * @ORM\Table(name="plano")
 * @ORM\Entity
 */
class Plano
{
    /**
     * @var string
     *
     * @ORM\Column(name="TIPO", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRICAO", type="string", length=100, nullable=true)
     */
    private $descricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="EMPRESA", type="integer", nullable=true)
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="PLANO", type="string", length=10, nullable=true)
     */
    private $plano;

    /**
     * @var string
     *
     * @ORM\Column(name="STATUS", type="integer", nullable=true)
     */
    private $status;


    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Plano
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Plano
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
     * Set status
     *
     * @param integer $status
     *
     * @return Plano
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
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
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Plano
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set plano
     *
     * @param string $plano
     *
     * @return Plano
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

}
