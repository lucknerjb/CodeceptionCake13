<?php
namespace Codeception\Module\Cakephp\Helpers;

use \Configure;

trait ConfigTrait {
   public function seeInConfig($key, $value = null) {
      // echo CORE_PATH; die;
      $message = "Could not find the {$key} config key";

      if (is_null($value)) {
         $configValue = Configure::read($key);
         $this->assertTrue(empty($configValue) === false, $message);
         return;
      }

      $message .= ' with ' . json_encode($value);
      $this->assertEquals($value, \Configure::read($key), $message);
   }
}
