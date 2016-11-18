<?php

/*
 * Setor de pesquisa e desenvolvimento - Kopp Tecnologia.
 */

/**
 * Description of Log
 *
 * @author Kelvin Pereira Alves <kelvinpalves@gmail.com>
 */
class Log {
    public static function getLog($class) {
        Logger::configure(Config::LOG_4_PHP_LAYOUT);
        return Logger::getLogger($class);
    }
}
