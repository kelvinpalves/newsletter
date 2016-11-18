<?php

/*
 * Setor de pesquisa e desenvolvimento - Kopp Tecnologia.
 */

/**
 * Description of Session
 *
 * @author Kelvin Pereira Alves <kelvinpalves@gmail.com>
 */
class Session {

    public static function init() {
        session_name('newsletter_forge');
        @session_start();
    }

    public static function setVar($idx, $vlr, $serializable = false) {
        $_SESSION[$idx] = $serializable ? serialize($vlr) : $vlr;
    }

    public static function getVar($idx, $serializable = false) {
        return ($serializable) ? unserialize($_SESSION[$idx]) : $_SESSION[$idx];
    }

    public static function exists($idx) {
        return isset($_SESSION[$idx]);
    }

    public static function destroy() {
        session_destroy();
        foreach ($_SESSION as $session) {
            if (isset($session)) {
                unset($session);
            }
        }
    }
    
    public static function deleteVar($idx) {
        unset($_SESSION[$idx]);
    }

}
