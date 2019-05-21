<?php
  namespace App\Controller;
  use App\Controller\AppController;
  use Cake\Auth\DefaultPasswordHasher;
  use Cake\Event\Event;

  class Ex_usersController extends AppController{
    public function initialize(){
      parent::initialize();
      //コンポーネント
      $this->loadComponent('RequestHandler');
      $this->loadComponent('Flash');
      $this->loadComponent('Auth',[
        'authorize' => ['Controller'],
        'authenticate' => [
          'Form' => [
            'fields' => [
              'username' => 'username',
              'password' => 'password'
            ]
          ]
        ],
        'loginRedirect' => [
          'controller' => 'Ex_users',
          'action' => 'login'
        ],
        'logoutRedirect' => [
          'controller' => 'Ex_users',
          'action' => 'logout'
        ],
        'authError' => 'ログインして下さい。',
      ]);
    }

    public function index(){
      $data = $this->Ex_users->find('all');
      $this->set('data', $data);
    }

    public function add(){
      $user = $this->Ex_users->newEntity();
      if($this->request->is('post')){
        $user = $this->Ex_users->patchEntity($user,$this->request->getData());
        if($this->Ex_users->save($user)){
          $this->Flash->success(__('The has been saved.'));
          return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The user could not be saved.'));
      }
      $this->set(compact('user'));
    }

    public function login(){
      if($this->request->isPost()){
        //Postされたユーザー名とパスワードをもとにデータベースを検索。
        //ユーザー名とパスワードに該当するユーザーがreturnされる。なければ空
        $user = $this->Auth->identify();

        if(!empty($user)){
          $this->Auth->setUser($user);  //セッションにユーザー情報を保存する
          return $this->redirect($this->Auth->redirectUrl()); //元のページにリダイレクト
        }
        $this->Flash->error('ユーザー名かパスワードが間違っています。');
      }
    }

    public function logout(){
      $this->request->session()->destroy();
      return $this->redirect($this->Auth->redirectUrl());
    }

    public function beforeFilter(Event $event){  //ログイン処理前に実行されるフィルタ処理
      parent::beforeFilter($event);
      $this->Auth->allow('add','index','login');
    }

    public function inAuthorized($user = null){
      if($user['role'] === 'admin'){
        return true;
      }elseif ($user['role'] === 'user') {
        return false;
      }else{
        return false;
      }
    }
  }
?>
