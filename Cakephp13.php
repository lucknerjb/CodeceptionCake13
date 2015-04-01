<?php
namespace Codeception\Module;

use Codeception\Lib\Framework;
use Codeception\Module as CodeceptionModule;
use Codeception\Subscriber\ErrorHandler;
use Codeception\Lib\Connector\Universal as UniversalConnector;
use Codeception\Module\Cakephp\Helpers\ConfigTrait;

class Cakephp13 extends Framework {
   use ConfigTrait;
   public $kernel;
   protected $config = [];

   public function __construct($config = null) {
      $this->config = array_merge(
         array(
            'cleanup' => true,
            'unit' => true,
            'environment' => 'testing',
            'start' => 'bootstrap' . DIRECTORY_SEPARATOR . 'start.php',
            'root' => '',
            'filters' => false,
         ),
         (array)$config
      );
      parent::__construct();
   }

   public function _initialize() {
      $app = $this->getApplication();
      $this->kernel = $app;
      $this->client = new \stdclass;
      $this->client = new UniversalConnector;
      $index = WEBROOT_DIR . DIRECTORY_SEPARATOR . 'index.php';
      $this->client->setIndex($index);
      $this->revertErrorHandler();
   }

   protected function revertErrorHandler() {
      $handler = new ErrorHandler();
      set_error_handler(array($handler, 'errorHandler'));
   }

   private function resetApplication() {
      // 1 - Clear Config
      // 2 - Clear DB
      // 3 - Re-run fixtures


      // Configure::clear();
   }

   private function getApplication() {
      $projectDir = \Codeception\Configuration::projectDir();
      $projectDir .= $this->config['root'];

      if (!defined('DS')) {
         define('DS', DIRECTORY_SEPARATOR);
      }
      if (!defined('ROOT')) {
         // define('ROOT', $projectDir);
         define('ROOT', '');
      }
      if (!defined('APP_DIR')) {
         define('APP_DIR', $projectDir . 'app');
      }

      if (!defined('CAKE_CORE_INCLUDE_PATH')) {
         define('CAKE_CORE_INCLUDE_PATH', ROOT);
      }
      if (!defined('WEBROOT_DIR')) {
         define('WEBROOT_DIR', APP_DIR . DS . 'webroot');
      }
      if (!defined('WWW_ROOT')) {
         define('WWW_ROOT', WEBROOT_DIR . DS);
      }
      // if (!defined('CORE_PATH')) {
      //    if (function_exists('ini_set') && ini_set('include_path', CAKE_CORE_INCLUDE_PATH . PATH_SEPARATOR . ROOT . DS . APP_DIR . DS . PATH_SEPARATOR . ini_get('include_path'))) {
      //       define('APP_PATH', null);
      //       define('CORE_PATH', null);
      //    } else {
      //       define('APP_PATH', ROOT . DS . APP_DIR . DS);
      //       define('CORE_PATH', CAKE_CORE_INCLUDE_PATH . DS);
      //    }
      // }
      if (php_sapi_name() == 'cli-server') {
         $_SERVER['PHP_SELF'] = '/'.basename(__FILE__);
      }

      define('CORE_PATH', CAKE_CORE_INCLUDE_PATH);

      // include(CORE_PATH . 'cake' . DS . 'bootstrap.php');

      // $Dispatcher = new \Dispatcher();
      // \Configure::write('test', 123);
   }

   public function _before(\Codeception\TestCase $test) {
      // $this->getApplication();
   }

   public function _after() {
   }

   public function config($key, $value = null) {
      \Configure::write($key, 123);
   }

   // public function seeInConfig($key, $value = null) {
   //    return true;
   // }
}
