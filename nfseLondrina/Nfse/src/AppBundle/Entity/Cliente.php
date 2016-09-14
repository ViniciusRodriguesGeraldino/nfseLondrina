<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity
 */
class Cliente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="EMPRESA", type="integer", nullable=true)
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=60, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="ENDERECO", type="string", length=40, nullable=true)
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="NUMERO", type="string", length=6, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="BAIRRO", type="string", length=40, nullable=true)
     */
    private $bairro;

    /**
     * @var string
     *
     * @ORM\Column(name="COMPLEMENTO", type="string", length=50, nullable=true)
     */
    private $complemento;

    /**
     * @var string
     *
     * @ORM\Column(name="CIDADE", type="string", length=30, nullable=true)
     */
    private $cidade;

    /**
     * @var string
     *
     * @ORM\Column(name="COD_CID", type="string", length=7, nullable=true)
     */
    private $codCid;

    /**
     * @var string
     *
     * @ORM\Column(name="UF", type="string", length=2, nullable=true)
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="CEP", type="string", length=9, nullable=true)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="FONE", type="string", length=15, nullable=true)
     */
    private $fone;

    /**
     * @var string
     *
     * @ORM\Column(name="CPFCNPJ", type="string", length=18, nullable=true)
     */
    private $cpfcnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="RG", type="string", length=18, nullable=true)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="E_MAIL", type="string", length=60, nullable=true)
     */
    private $eMail;

    /**
     * @var string
     *
     * @ORM\Column(name="CELULAR", type="string", length=15, nullable=true)
     */
    private $celular;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATA_NASC", type="date", nullable=true)
     */
    private $dataNasc;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO_CIVIL", type="string", length=15, nullable=true)
     */
    private $estadoCivil;

    /**
     * @var string
     *
     * @ORM\Column(name="NOME_CONJUGE", type="string", length=60, nullable=true)
     */
    private $nomeConjuge;

    /**
     * @var string
     *
     * @ORM\Column(name="PROFISSAO", type="string", length=30, nullable=true)
     */
    private $profissao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATA", type="date", nullable=true)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="SEXO", type="string", length=1, nullable=true)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="RACA", type="string", length=1, nullable=true)
     */
    private $raca;

    /**
     * @var string
     *
     * @ORM\Column(name="NATURALIDADE", type="string", length=50, nullable=true)
     */
    private $naturalidade;

    /**
     * @var string
     *
     * @ORM\Column(name="OBS", type="string", length=250, nullable=true)
     */
    private $obs;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="IE", type="string", length=15, nullable=true)
     */
    private $ie;

    /**
     * @var integer
     *
     * @ORM\Column(name="STATUS", type="integer", nullable=true)
     */
    private $status;


    /**
     * Set empresa
     *
     * @param integer $empresa
     *
     * @return Cliente
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
     * Set nome
     *
     * @param string $nome
     *
     * @return Cliente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Set ie
     *
     * @param string $ie
     *
     * @return Cliente
     */
    public function setIe($ie)
    {
        $this->ie = $ie;

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
     * Get ie
     *
     * @return string
     */
    public function getIe()
    {
        return $this->ie;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Cliente
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Cliente
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
     * Set bairro
     *
     * @param string $bairro
     *
     * @return Cliente
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro
     *
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     *
     * @return Cliente
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     *
     * @return Cliente
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set codCid
     *
     * @param string $codCid
     *
     * @return Cliente
     */
    public function setCodCid($codCid)
    {
        $this->codCid = $codCid;

        return $this;
    }

    /**
     * Get codCid
     *
     * @return string
     */
    public function getCodCid()
    {
        return $this->codCid;
    }

    /**
     * Set uf
     *
     * @param string $uf
     *
     * @return Cliente
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get uf
     *
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set cep
     *
     * @param string $cep
     *
     * @return Cliente
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set fone
     *
     * @param string $fone
     *
     * @return Cliente
     */
    public function setFone($fone)
    {
        $this->fone = $fone;

        return $this;
    }

    /**
     * Get fone
     *
     * @return string
     */
    public function getFone()
    {
        return $this->fone;
    }

    /**
     * Set cpfcnpj
     *
     * @param string $cpfcnpj
     *
     * @return Cliente
     */
    public function setCpfcnpj($cpfcnpj)
    {
        $this->cpfcnpj = $cpfcnpj;

        return $this;
    }

    /**
     * Get cpfcnpj
     *
     * @return string
     */
    public function getCpfcnpj()
    {
        return $this->cpfcnpj;
    }

    /**
     * Set rg
     *
     * @param string $rg
     *
     * @return Cliente
     */
    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * Get rg
     *
     * @return string
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set eMail
     *
     * @param string $eMail
     *
     * @return Cliente
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;

        return $this;
    }

    /**
     * Get eMail
     *
     * @return string
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * Set celular
     *
     * @param string $celular
     *
     * @return Cliente
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set dataNasc
     *
     * @param \DateTime $dataNasc
     *
     * @return Cliente
     */
    public function setDataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;

        return $this;
    }

    /**
     * Get dataNasc
     *
     * @return \DateTime
     */
    public function getDataNasc()
    {
        return $this->dataNasc;
    }

    /**
     * Set estadoCivil
     *
     * @param string $estadoCivil
     *
     * @return Cliente
     */
    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;

        return $this;
    }

    /**
     * Get estadoCivil
     *
     * @return string
     */
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    /**
     * Set nomeConjuge
     *
     * @param string $nomeConjuge
     *
     * @return Cliente
     */
    public function setNomeConjuge($nomeConjuge)
    {
        $this->nomeConjuge = $nomeConjuge;

        return $this;
    }

    /**
     * Get nomeConjuge
     *
     * @return string
     */
    public function getNomeConjuge()
    {
        return $this->nomeConjuge;
    }

    /**
     * Set profissao
     *
     * @param string $profissao
     *
     * @return Cliente
     */
    public function setProfissao($profissao)
    {
        $this->profissao = $profissao;

        return $this;
    }

    /**
     * Get profissao
     *
     * @return string
     */
    public function getProfissao()
    {
        return $this->profissao;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     *
     * @return Cliente
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
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Cliente
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set raca
     *
     * @param string $raca
     *
     * @return Cliente
     */
    public function setRaca($raca)
    {
        $this->raca = $raca;

        return $this;
    }

    /**
     * Get raca
     *
     * @return string
     */
    public function getRaca()
    {
        return $this->raca;
    }

    /**
     * Set naturalidade
     *
     * @param string $naturalidade
     *
     * @return Cliente
     */
    public function setNaturalidade($naturalidade)
    {
        $this->naturalidade = $naturalidade;

        return $this;
    }

    /**
     * Get naturalidade
     *
     * @return string
     */
    public function getNaturalidade()
    {
        return $this->naturalidade;
    }

    /**
     * Set obs
     *
     * @param string $obs
     *
     * @return Cliente
     */
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }


    /**
     * Get obs
     *
     * @return string
     */
    public function getObs()
    {
        return $this->obs;
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
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Cliente
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
