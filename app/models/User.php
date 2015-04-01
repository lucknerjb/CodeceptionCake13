<?php

class User extends AppModel {
   public $table = 'users';

   public static function me() {
      echo '- me - ';
   }

   public static function whereActive() {
      echo '- whereActive - ';
   }
}
