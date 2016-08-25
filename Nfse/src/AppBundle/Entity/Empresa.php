<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity
 */
class Empresa
{
    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=70, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="UF", type="string", length=2, nullable=true)
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="FONE", type="string", length=15, nullable=true)
     */
    private $fone;

    /**
     * @var string
     *
     * @ORM\Column(name="E_MAIL", type="string", length=60, nullable=true)
     */
    private $eMail;

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
     * @ORM\Column(name="COMPLEMENTO", type="string", length=35, nullable=true)
     */
    private $complemento;

    /**
     * @var string
     *
     * @ORM\Column(name="BAIRRO", type="string", length=30, nullable=true)
     */
    private $bairro;

    /**
     * @var string
     *
     * @ORM\Column(name="CIDADE", type="string", length=30, nullable=true)
     */
    private $cidade;

    /**
     * @var string
     *
     * @ORM\Column(name="CEP", type="string", length=9, nullable=true)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="CPFCNPJ", type="string", length=18, nullable=true)
     */
    private $cpfcnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="CAMINHO_LOGO", type="string", length=230, nullable=true)
     */
    private $caminhoLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="CMC", type="string", length=15, nullable=true)
     */
    private $cmc;

    /**
     * @var string
     *
     * @ORM\Column(name="CNAE_PREFEITURA", type="string", length=20, nullable=true)
     */
    private $cnaePrefeitura;

    /**
     * @var string
     *
     * @ORM\Column(name="CPF_PREFEITURA", type="string", length=11, nullable=true)
     */
    private $cpfPrefeitura;

    /**
     * @var string
     *
     * @ORM\Column(name="SENHA_PREFEITURA", type="string", length=30, nullable=true)
     */
    private $senhaPrefeitura;

    /**
     * @var string
     *
     * @ORM\Column(name="PRODUCAO", type="string", length=1, nullable=true)
     */
    private $producao;

    /**
     * @var string
     *
     * @ORM\Column(name="SIMPLES", type="string", length=1, nullable=true)
     */
    private $simples;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="INICIO_ATIVIDADE", type="date", nullable=true)
     */
    private $inicioAtividade;

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
     * @ORM\Column(name="COD_CID", type="string", length=15, nullable=true)
     */
    private $codCid;



    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Empresa
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
     * Set uf
     *
     * @param string $uf
     *
     * @return Empresa
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
     * Set fone
     *
     * @param string $fone
     *
     * @return Empresa
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
     * Set eMail
     *
     * @param string $eMail
     *
     * @return Empresa
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
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Empresa
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
     * Set numero
     *
     * @param string $numero
     *
     * @return Empresa
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
     * Set complemento
     *
     * @param string $complemento
     *
     * @return Empresa
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
     * Set bairro
     *
     * @param string $bairro
     *
     * @return Empresa
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
     * Set cidade
     *
     * @param string $cidade
     *
     * @return Empresa
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
     * Set cep
     *
     * @param string $cep
     *
     * @return Empresa
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
     * Set cpfcnpj
     *
     * @param string $cpfcnpj
     *
     * @return Empresa
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
     * Set caminhoLogo
     *
     * @param string $caminhoLogo
     *
     * @return Empresa
     */
    public function setCaminhoLogo($caminhoLogo)
    {
        $this->caminhoLogo = $caminhoLogo;

        return $this;
    }

    /**
     * Get caminhoLogo
     *
     * @return string
     */
    public function getCaminhoLogo()
    {
        return $this->caminhoLogo;
    }

    /**
     * Set cmc
     *
     * @param string $cmc
     *
     * @return Empresa
     */
    public function setCmc($cmc)
    {
        $this->cmc = $cmc;

        return $this;
    }

    /**
     * Get cmc
     *
     * @return string
     */
    public function getCmc()
    {
        return $this->cmc;
    }

    /**
     * Set cnaePrefeitura
     *
     * @param string $cnaePrefeitura
     *
     * @return Empresa
     */
    public function setCnaePrefeitura($cnaePrefeitura)
    {
        $this->cnaePrefeitura = $cnaePrefeitura;

        return $this;
    }

    /**
     * Get cnaePrefeitura
     *
     * @return string
     */
    public function getCnaePrefeitura()
    {
        return $this->cnaePrefeitura;
    }

    /**
     * Set cpfPrefeitura
     *
     * @param string $cpfPrefeitura
     *
     * @return Empresa
     */
    public function setCpfPrefeitura($cpfPrefeitura)
    {
        $this->cpfPrefeitura = $cpfPrefeitura;

        return $this;
    }

    /**
     * Get cpfPrefeitura
     *
     * @return string
     */
    public function getCpfPrefeitura()
    {
        return $this->cpfPrefeitura;
    }

    /**
     * Set senhaPrefeitura
     *
     * @param string $senhaPrefeitura
     *
     * @return Empresa
     */
    public function setSenhaPrefeitura($senhaPrefeitura)
    {
        $this->senhaPrefeitura = $senhaPrefeitura;

        return $this;
    }

    /**
     * Get senhaPrefeitura
     *
     * @return string
     */
    public function getSenhaPrefeitura()
    {
        return $this->senhaPrefeitura;
    }

    /**
     * Set producao
     *
     * @param string $producao
     *
     * @return Empresa
     */
    public function setProducao($producao)
    {
        $this->producao = $producao;

        return $this;
    }

    /**
     * Get producao
     *
     * @return string
     */
    public function getProducao()
    {
        return $this->producao;
    }

    /**
     * Set simples
     *
     * @param string $simples
     *
     * @return Empresa
     */
    public function setSimples($simples)
    {
        $this->simples = $simples;

        return $this;
    }

    /**
     * Get simples
     *
     * @return string
     */
    public function getSimples()
    {
        return $this->simples;
    }

    /**
     * Set inicioAtividade
     *
     * @param \DateTime $inicioAtividade
     *
     * @return Empresa
     */
    public function setInicioAtividade($inicioAtividade)
    {
        $this->inicioAtividade = $inicioAtividade;

        return $this;
    }

    /**
     * Get inicioAtividade
     *
     * @return \DateTime
     */
    public function getInicioAtividade()
    {
        return $this->inicioAtividade;
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
