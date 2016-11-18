<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * FilaEnvio
 *
 * @ORM\Table(name="fila_envio", indexes={@ORM\Index(name="fk_fila_envio_situacao", columns={"id_situacao"}), @ORM\Index(name="fk_fila_envio_template", columns={"id_template"})})
 * @ORM\Entity
 */
class FilaEnvio implements JsonSerializable {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Situacao
     *
     * @ORM\ManyToOne(targetEntity="Situacao", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_situacao", referencedColumnName="id")
     * })
     */
    private $situacao;
    
    /**
     * @var \Template
     *
     * @ORM\ManyToOne(targetEntity="Template", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_template", referencedColumnName="id")
     * })
     */
    private $template;
    
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", nullable=false)
     */
    private $email;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="mes", type="integer", nullable=false)
     */
    private $mes;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="ano", type="integer", nullable=false)
     */
    private $ano;
    
    /**
     *
     * @var datetime
     * 
     * @ORM\Column(name="ts_envio", type="datetime")
     */
    private $tsEnvio;
    
    /**
     *
     * @var datetime
     * 
     * @ORM\Column(name="ts_visualizacao", type="datetime")
     */
    private $tsVisualizacao;
    
    function getTsVisualizacao() {
        return $this->tsVisualizacao;
    }

    function setTsVisualizacao(datetime $tsVisualizacao) {
        $this->tsVisualizacao = $tsVisualizacao;
    }
    
    function getMes() {
        return $this->mes;
    }

    function getAno() {
        return $this->ano;
    }

    function setMes($mes) {
        $this->mes = $mes;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    
    function getId() {
        return $this->id;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setSituacao(\Situacao $situacao) {
        $this->situacao = $situacao;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    function getTemplate() {
        return $this->template;
    }
    
    function getTsEnvio() {
        return $this->tsEnvio;
    }

    function setTsEnvio(datetime $tsEnvio) {
        $this->tsEnvio = $tsEnvio;
    }

    
    function setTemplate(\Template $template) {
        $this->template = $template;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
