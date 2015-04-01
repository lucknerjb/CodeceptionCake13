<?php

App::import('model', 'User');

class UserRepo {
   public static function findById($id) {
      echo User::whereActive();
      echo User::me();
      echo 'found!';
   }
}
