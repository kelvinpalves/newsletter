<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity
 */
class Cliente implements JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nm_cliente", type="string", nullable=false)
     */
    private $nmCliente;
    
    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", nullable=false)
     */
    private $login;
    
    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", nullable=false)
     */
    private $senha;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="total_email", type="integer", nullable=false)
     */
    private $totalEmail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="url_contatos", type="string", nullable=false)
     */
    private $urlContatos;
    
    /**
     * @var string
     *
     * @ORM\Column(name="host_smtp", type="string", nullable=false)
     */
    private $hostSmtp;
    
    /**
     * @var string
     *
     * @ORM\Column(name="user_name_smtp", type="string", nullable=false)
     */
    private $userNameSmtp;
    
    /**
     * @var string
     *
     * @ORM\Column(name="password_smtp", type="string", nullable=false)
     */
    private $passwordSmtp;
    
    /**
     * @var string
     *
     * @ORM\Column(name="from_smtp", type="string", nullable=false)
     */
    private $fromSmtp;
    
    /**
     * @var string
     *
     * @ORM\Column(name="from_name_smtp", type="string", nullable=false)
     */
    private $fromNameSmtp;
    
    function getUrlContatos() {
        return $this->urlContatos;
    }

    function setUrlContatos($urlContatos) {
        $this->urlContatos = $urlContatos;
    }

        
    function getId() {
        return $this->id;
    }

    function getNmCliente() {
        return $this->nmCliente;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getTotalEmail() {
        return $this->totalEmail;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNmCliente($nmCliente) {
        $this->nmCliente = $nmCliente;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setTotalEmail($totalEmail) {
        $this->totalEmail = $totalEmail;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
    
    function getHostSmtp() {
        return $this->hostSmtp;
    }

    function getUserNameSmtp() {
        return $this->userNameSmtp;
    }

    function getPasswordSmtp() {
        return $this->passwordSmtp;
    }

    function getFromSmtp() {
        return $this->fromSmtp;
    }

    function getFromNameSmtp() {
        return $this->fromNameSmtp;
    }

    function setHostSmtp($hostSmtp) {
        $this->hostSmtp = $hostSmtp;
    }

    function setUserNameSmtp($userNameSmtp) {
        $this->userNameSmtp = $userNameSmtp;
    }

    function setPasswordSmtp($passwordSmtp) {
        $this->passwordSmtp = $passwordSmtp;
    }

    function setFromSmtp($fromSmtp) {
        $this->fromSmtp = $fromSmtp;
    }

    function setFromNameSmtp($fromNameSmtp) {
        $this->fromNameSmtp = $fromNameSmtp;
    }
}
