<?php

// App::import('repository', 'UserRepo');
require 'UserRepo.php';

class WelcomeController extends AppController {
   public $uses = [];

   public function index() {
      echo UserRepo::findById(1); die;
   }
}
