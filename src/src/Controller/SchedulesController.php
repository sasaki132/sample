<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

class SchedulesController extends AppController {

	public function index() {
		if ($this->request->is('post')){
			$data =  $this->request->data['Schedules'];
			$entity = $this->Schedules->newEntity($data);
			$this->Schedules->save($entity);
		} else {
			$entity = $this->Schedules->newEntity();
		}
		$data = $this->Schedules->find('all')
			->contain(['Staff','Courses']);
		$this->set('data', $data);
		$this->set('entity', $entity);
	}

}
