<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Situacao
 *
 * @ORM\Table(name="situacao")
 * @ORM\Entity
 */
class Situacao implements JsonSerializable {
    
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
     * @ORM\Column(name="ds_situacao", type="string", nullable=false)
     */
    private $dsSituacao;
    
    function getId() {
        return $this->id;
    }

    function getDsSituacao() {
        return $this->dsSituacao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDsSituacao($dsSituacao) {
        $this->dsSituacao = $dsSituacao;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
