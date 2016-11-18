<?php

class Controller {

    private $methodExists = true;

    function __call($method, $params) {
        $this->methodExists = false;
    }

    public function getMethodExists() {
        return $this->methodExists;
    }

    public function setMethodExists($methodExists) {
        $this->methodExists = $methodExists;
    }

}
