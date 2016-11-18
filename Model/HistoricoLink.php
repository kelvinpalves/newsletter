<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoricoLink
 *
 * @ORM\Table(name="historico_link")
 * @ORM\Entity
 */
class HistoricoLink implements JsonSerializable {
    
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
     * @ORM\Column(name="url", type="string", nullable=false)
     */
    private $url;
    
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", nullable=false)
     */
    private $email;
    
    /**
     * @var string
     *
     * @ORM\Column(name="template", type="string", nullable=false)
     */
    private $template;
    
    function getId() {
        return $this->id;
    }

    function getUrl() {
        return $this->url;
    }

    function getEmail() {
        return $this->email;
    }

    function getTemplate() {
        return $this->template;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTemplate($template) {
        $this->template = $template;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
