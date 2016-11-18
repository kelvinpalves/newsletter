<?php

/*
 * Setor de pesquisa e desenvolvimento - Kopp Tecnologia.
 */

/**
 * Description of Redirect
 *
 * @author Kelvin Pereira Alves <kelvinpalves@gmail.com>
 */
class Redirect {
    public static function load($controller) {
        header('Location: http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/newsletter/' . $controller);
    }
    
    public static function loadAdmin($controller) {
        header('Location: http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/administrador/' . $controller);
    }
}