<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

class SchedulesTable extends Table {

	public function initialize(array $config) {
		parent::initialize($config);
		$this->setPrimaryKey('code');
		$this->belongsTo('Staff');
		$this->belongsTo('Courses');
	}

	public function validationDefault(Validator $validator) {
		$validator
		  ->integer('code');

		$validator
			->integer('course_id', 'courseは整数で入力して下さい。')
			->notEmpty('course_id', 'courseは必ず記入下さい。');

		$validator
			->integer('staff_id', 'staffは整数で入力して下さい。')
			->notEmpty('staff_id', 'staffは必ず記入下さい。');

		$validator
			->date('start_date',['ymd'],'開始日を入力して下さい。')
			->notEmpty('start_date', '開始日は必ず入力して下さい。');

		$validator
			->date('end_date',['ymd'],'終了日を入力して下さい。')
			->allowEmpty('end_date');

		return $validator;
	}
}
