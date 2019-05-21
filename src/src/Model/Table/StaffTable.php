<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class StaffTable extends Table {
  public function initialize(array $config) {
    parent::initialize($config);
    $this->setPrimaryKey('code');
    $this->hasMany('Schedues');
  }
}
