<?php
namespace util;

include_once('vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Psr\Log\LoggerInterface;


class LogFactory{

    public static function getLogger(string $canal = 'miApp') : Logger{
        $log = new Logger($canal);
        $log->pushHandler(new StreamHandler('logs/miApp.log', Logger::DEBUG));

        return $log;
    }
}