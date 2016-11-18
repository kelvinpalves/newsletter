<?php

class Routes {

    private $controller;
    private $method;
    private $id;
    private $log;
    
    public function __construct() {
        $this->log = Log::getLog(__CLASS__);
    }

    public function redirect() {
        $this->controller = (isset($_GET['c'])) ? $_GET['c'] : (isset($_POST['c']) ? $_POST['c'] : null);
        $this->method = (isset($_GET['m'])) ? $_GET['m'] : (isset($_POST['m']) ? $_POST['m'] : null);
        $this->id = (isset($_GET['id'])) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);
 
        if ($this->controller != null) {
            $this->controller = strtolower($this->controller);
            $className = split("-", $this->controller);
            
            $controllerName = "";
            foreach ($className as $partsOfName) {
                $controllerName .= ucfirst($partsOfName);
            }
            
            $file = '.' . Config::PATH_CONTROLLER . $controllerName . 'Controller.php';
            
            $this->log->info($file);

            if (!file_exists($file)) {
                $this->controller = null;
            } else {
                require_once $file;
                $this->controller = $controllerName . 'Controller';
            }
        }

        return ($this->controller != null && $this->method != null);
    }

    public function getController() {
        return $this->controller;
    }

    public function getMethod() {
        return $this->method;
    }

    public function setController($controller) {
        $this->controller = $controller;
    }

    public function setMethod($method) {
        $this->method = $method;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

}
