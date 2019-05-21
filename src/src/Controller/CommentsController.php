<?php
  namespace App\Controller;
  use App\Controller\AppController;
  use Cake\I18n\Time;

  class CommentsController extends AppController{
    public function index(){ //バリデーションチェック
      $this->viewBuilder()->enableAutoLayout(false);
      date_default_timezone_set('Asia/Tokyo');
      if ($this->request->is('post')){
        $data = $this->request->data['Comments'];
        $entity = $this->Comments->newEntity($data);
        $entity->date = new Time(date('Y-m-d h:i:s'));
        $this->Comments->save($entity);
  		} else {
  			$entity = $this->Comments->newEntity();
  		}
      $data = $this->Comments->find('all');
      $this->set('data',$data);
      $this->set('entity', $entity);
  	}
  }
?>
