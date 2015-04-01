<?php
namespace Codeception\Module\Cakephp;

trait MemcacheTrait {
   public function grabFromMemcache($value) {
      echo "\n\n";
      echo $value; die;
   }

   public function grabFromServer($value) {
      echo 1; die;
   }
}
