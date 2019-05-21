<?php
  namespace App\Model\Table;
  use Cake\ORM\Table;

  class Ex_usersTable extends Table{
    protected $table = 'Ex_users';
    public function initialize(array $config){  //$config：cakePHP各種設定が格納された配列
      parent::initialize($config);
      //テーブルの基本設定
      $this->setTable('Ex_users');
      $this->setDisplayField('name'); //取り出す特定項目。find('list')で取得される値
      $this->setPrimaryKey('id');

    }
  }
 ?>
