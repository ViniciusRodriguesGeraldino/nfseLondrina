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
     * @ORM\Column(name="TIPO", type="string", length=20, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRICAO", type="string", length=500, nullable=true)
     */
    private $descricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="ORDEM", type="integer", nullable=true)
     */
    private $ordem;

    /**
     * @var string
     *
     * @ORM\Column(name="TIP", type="string", length=10, nullable=true)
     */
    private $tip;

    /**
     * @var string
     *
     * @ORM\Column(name="CONTA_SUP", type="string", length=50, nullable=true)
     */
    private $contaSup;

    /**
     * @var string
     *
     * @ORM\Column(name="NIVEL", type="string", length=10, nullable=true)
     */
    private $nivel;

    /**
     * @var string
     *
     * @ORM\Column(name="NATUREZA", type="string", length=10, nullable=true)
     */
    private $natureza;

    /**
     * @var string
     *
     * @ORM\Column(name="ORIENTACOES", type="string", length=1024, nullable=true)
     */
    private $orientacoes;

    /**
     * @var string
     *
     * @ORM\Column(name="CODIGO", type="string", length=50)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;



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
     * Set ordem
     *
     * @param integer $ordem
     *
     * @return Plano
     */
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;

        return $this;
    }

    /**
     * Get ordem
     *
     * @return integer
     */
    public function getOrdem()
    {
        return $this->ordem;
    }

    /**
     * Set tip
     *
     * @param string $tip
     *
     * @return Plano
     */
    public function setTip($tip)
    {
        $this->tip = $tip;

        return $this;
    }

    /**
     * Get tip
     *
     * @return string
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * Set contaSup
     *
     * @param string $contaSup
     *
     * @return Plano
     */
    public function setContaSup($contaSup)
    {
        $this->contaSup = $contaSup;

        return $this;
    }

    /**
     * Get contaSup
     *
     * @return string
     */
    public function getContaSup()
    {
        return $this->contaSup;
    }

    /**
     * Set nivel
     *
     * @param string $nivel
     *
     * @return Plano
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return string
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set natureza
     *
     * @param string $natureza
     *
     * @return Plano
     */
    public function setNatureza($natureza)
    {
        $this->natureza = $natureza;

        return $this;
    }

    /**
     * Get natureza
     *
     * @return string
     */
    public function getNatureza()
    {
        return $this->natureza;
    }

    /**
     * Set orientacoes
     *
     * @param string $orientacoes
     *
     * @return Plano
     */
    public function setOrientacoes($orientacoes)
    {
        $this->orientacoes = $orientacoes;

        return $this;
    }

    /**
     * Get orientacoes
     *
     * @return string
     */
    public function getOrientacoes()
    {
        return $this->orientacoes;
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
