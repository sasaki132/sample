<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class CoursesTable extends Table {
  public function initialize(array $config) {
    parent::initialize($config);
    $this->setPrimaryKey('code');
    $this->hasMany('Schedules');
  }
}
