<?php
namespace Codeception\Module;

class CakeCore extends \Codeception\Module
{
    public function __construct()
    {
        define('APP_DIR', 'app');
        define('DS', DIRECTORY_SEPARATOR);
        define('ROOT', getcwd());
        define('WEBROOT_DIR', 'webroot');
        define('WWW_ROOT', ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS);

        if (!defined('CAKE_CORE_INCLUDE_PATH')) {
            define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'lib');
        }

        require CAKE_CORE_INCLUDE_PATH . DS . 'Cake' . DS . 'bootstrap.php';
    }
}
