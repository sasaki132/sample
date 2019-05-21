<?php
  namespace App\Controller;
  use App\Controller\AppController;

  class LayoutTestController extends AppController{
    public function initialize(){
      $this->viewBuilder()->setLayout('layouttest');
    }
    public function index(){

    }
  }
 ?>
