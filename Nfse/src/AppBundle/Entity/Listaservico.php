<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listaservico
 *
 * @ORM\Table(name="listaservico")
 * @ORM\Entity
 */
class Listaservico
{
    /**
     * @var string
     *
     * @ORM\Column(name="DESCRICAO", type="string", length=255, nullable=true)
     */
    private $descricao;

    /**
     * @var float
     *
     * @ORM\Column(name="ALIQUOTA", type="float", precision=10, scale=0, nullable=true)
     */
    private $aliquota;

    /**
     * @var string
     *
     * @ORM\Column(name="CODIGO", type="string", length=6)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;



    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Listaservico
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
     * Set aliquota
     *
     * @param float $aliquota
     *
     * @return Listaservico
     */
    public function setAliquota($aliquota)
    {
        $this->aliquota = $aliquota;

        return $this;
    }

    /**
     * Get aliquota
     *
     * @return float
     */
    public function getAliquota()
    {
        return $this->aliquota;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }
}
