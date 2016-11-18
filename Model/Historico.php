<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Historico
 *
 * @ORM\Table(name="historico")
 * @ORM\Entity
 */
class Historico implements JsonSerializable {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
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
     * @var integer
     *
     * @ORM\Column(name="total_enviado", type="integer", nullable=false)
     */
    private $totalEnviado;
    
    function getId() {
        return $this->id;
    }

    function getMes() {
        return $this->mes;
    }

    function getAno() {
        return $this->ano;
    }

    function getTotalEnviado() {
        return $this->totalEnviado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMes($mes) {
        $this->mes = $mes;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setTotalEnviado($totalEnviado) {
        $this->totalEnviado = $totalEnviado;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
