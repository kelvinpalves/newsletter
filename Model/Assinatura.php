<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Doctrine\ORM\Mapping as ORM;

/**
 * Assinatura
 *
 * @ORM\Table(name="assinatura")
 * @ORM\Entity
 */
class Assinatura implements JsonSerializable {
    
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
     * @ORM\Column(name="html_assinatura", type="string", nullable=false)
     */
    private $htmlAssinatura;
    
    function getId() {
        return $this->id;
    }

    function getHtmlAssinatura() {
        return $this->htmlAssinatura;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setHtmlAssinatura($htmlAssinatura) {
        $this->htmlAssinatura = $htmlAssinatura;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
