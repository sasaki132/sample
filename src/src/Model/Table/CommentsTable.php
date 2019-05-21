<?php
  namespace App\Model\Table;
  use Cake\ORM\Table;
  use Cake\ORM\Query;
  use Cake\ORM\RulesChecker;
  use Cake\Validation\Validator;

  class CommentsTable extends Table{
    public function initialize(array $config){
      parent::initialize($config);

      $this->setTable('comments');
      $this->setDisplayField('name');
      $this->setPrimaryKey('id');
    }

    public function validationDefault(Validator $validator) {
  		$validator
  		  ->integer('id');

  		$validator
  			->scalar('name', '名前は文字列で入力して下さい。')
  			->notEmpty('name', '名前は必ず記入下さい。');

  		$validator
  			->scalar('text', '投稿文は文字列で入力して下さい。')
  			->notEmpty('text', '投稿文は必ず記入下さい。');

  		return $validator;
  	}

  }
 ?>
