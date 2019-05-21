<?php
  namespace App\Model\Entity;
  use Cake\ORM\Entity;
  use Cake\Auth\DefaultPasswordHasher;

  class User extends Entity{
    protected $_accessible = [ //$_accessible:値の一括代入
      //name,password,roleが一括代入に対応している
      'username' => true,
      'password' => true,
      'role' => true
    ];

    protected $_hidden = [
      'password'
    ];

    protected function _setPassword($password){
      return (new DefaultPasswordHasher)->hash($password);
    }
  }
 ?>
