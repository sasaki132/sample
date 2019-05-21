<?php
  namespace App\Controller;
  use App\Controller\AppController;

  class StaffController extends AppController{
    public function index(){
      /*staffテーブルから全エンティティを取り出す
       *テーブルクラスと同名のプロパティが用意される
       *ControllerではStaffテーブルクラスのインスタンスが
       *「Staff」という名のプロパティとして組み込まれる*/
      $data = $this->Staff->find('all');
      //ビューテンプレートに'data'の名前で値を受け渡す
      $this->set('data', $data);
    }

    public function add(){
      $entity = $this->Staff->newEntity();
      $this->set('entity',$entity);
    }

    public function create(){ //☆addからの受け渡しが微妙
      if($this->request->is('post')){ //☆ is()
        $data = $this->request->data['Staff'];
        $entity = $this->Staff->newEntity($data);
        $this->Staff->save($entity);
      }
      return $this->redirect(['action'=>'index']);
    }

    public function edit(){
      $id = $this->request->query['id']; //☆ ここのid
      $entity = $this->Staff->get($id);
      $this->set('entity',$entity);
    }
    public function update(){
      if($this->request->is('post')){
        $data = $this->request->data['Staff'];
        $entity = $this->Staff->get($data['code']);
        $this->Staff->patchEntity($entity,$data);
        $this->Staff->save($entity);
      }
      return $this->redirect(['action'=>'index']);
    }

    public function delete(){
      $id = $this->request->query['id'];
      $entity = $this->Staff->get($id);
      $this->set('entity',$entity);
    }
    
    public function destroy(){
      if($this->request->is('post')){
        $data = $this->request->data['Staff'];
        $entity = $this->Staff->get($data['code']);
        $this->Staff->delete($entity);
      }
      return $this->redirect(['action'=>'index']);
    }
  }
 ?>
