<?php
  namespace App\Controller;
  use App\Controller\AppController;

  class PeopleController extends AppController{
    public $paginate = [
      'limit'=> 5,
      'sort'=>'id',
      'direction'=>'abc',
      'contain'=>['Messages'],
    ];
    public function initialize(){
      parent::initialize();
      $this->loadComponent('Paginator');
    }

    public function index(){
      $data = $this->paginate($this->People);
      $this->set('data',$data);

      // if($this->request->isPost()){ //post送信したら
      //   $find = $this->request->data['People']['find']; //入力文字列を受け取る(taro)
      //   // $arr = explode(',',$find);
      //   $data = $this->People->find('me',['me'=>$find]);
      // }else{
      //   $data = $this->People->find('byAge');
      // }
      // // $id = $this->request->query['id'];
      // // $data = $this->People->get($id);
      // $this->set('data',$data);
    }

    public function add(){
      //$entity = $this->request->data['people'];
      $msg = 'Prease type your personal data...';
      $entity = $this->People->newEntity();
      // $this->set('entity',$entity);

      if($this->request->is('post')){
        $data = $this->request->data['People'];
        $entity = $this->People->newEntity($data);
        if($this->People->save($entity)){
          return $this->redirect(['action'=>'index']);
        }
        $msg = 'Error was occured...';
      }
      $this->set('msg',$msg);
      $this->set('entity',$entity);
      }
    //
    // public function create(){
    //   if($this->request->is('post')){
    //     $data = $this->request->data['People'];
    //     $entity = $this->People->newEntity($data);
    //     $this->People->save($entity);
    //   }
    //   return $this->redirect(['action'=>'index']);
    // }

    public function edit(){
      $id = $this->request->query['id'];
      $entity = $this->People->get($id);
      $this->set('entity',$entity);
      //id名で検索したエンティティをセットする
    }

    public function update(){
      if($this->request->is('post')){
        $data = $this->request->data['People'];
        $entity = $this->People->get($data['id']);
        $this->People->patchEntity($entity,$data);
        $this->People->save($entity);
      }
      return $this->redirect(['action'=>'index']);
    }

    public function delete(){
      $id = $this->request->query['id'];
      $entity = $this->People->get($id);
      $this->set('entity',$entity);
    }

    public function destroy(){
      if($this->request->is('post')){
        $data = $this->request->data['People'];
        $entity = $this->People->get($data['id']);
        $this->People->delete($entity);
      }
      return $this->redirect(['action'=>'index']);
    }
  }
 ?>
