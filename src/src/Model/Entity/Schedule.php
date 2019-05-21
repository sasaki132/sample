<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

class Schedule extends Entity{
  protected $_accessible = [
    'course_id' => true,
    'staff_id' => true,
    'start_date' => true,
    'end_date' => true
  ];
}
