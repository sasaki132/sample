<?php
  namespace App\Model\Entity;
  use Cake\ORM\Entity;

  class Comment extends Entity{
    protected $_accessible = [
      'name' => true,
      'text' => true,
      'date' => true
    ];
  }
 ?>
