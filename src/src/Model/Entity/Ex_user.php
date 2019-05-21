<?php
  namespace App\Model\Entity;
  use Cake\ORM\Entity;

  class Ex_user extends Entity{
    protected $_accessible = [ //$_accessible:値の一括代入
      //name,password,roleが一括代入に対応している
      'name' => true,
      'pasword' => true,
      'role' => true
    ];
  }
 ?>
