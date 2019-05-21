<?php
  namespace App\Controller;
  use App\Controller\AppController;

  class Form1Controller extends AppController{
    // public function initialize(){
    //   $this->viewBuilder()->setLayout('form1');
    // }
    public function index(){
      //$this->viewBuilder()->enableAutoLayout(false);
      $this->viewBuilder()->setLayout('form1');
      $this->set('title','Hello!');
    }

    public function form(){
      //$this->viewBuilder()->enableAutoLayout(false);
      $this->viewBuilder()->setLayout('form1');
      $name = $this->request->data(['name']);
      $res = 'こんにちは'. $name. 'さん。';
      $values = [
        'message'=>$res
      ];
      $this->set($values);
    }
  }
 ?>
