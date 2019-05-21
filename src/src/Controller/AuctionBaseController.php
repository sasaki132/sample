<?php
  namespace App\Controller;
  use App\Controller\AppController;
  use Cake\Auth\DefaultPasswordHasher;
  use Cake\Event\Event;

  class AuctionBaseController extends AppController{
    //初期化
    public function initialize(){
      parent::initialize(); //親クラスのメソッドやプロパティにアクセス
      //必要なコンポーネントのロード
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
        'loginRedirect' => [ //ログイン時のリダイレクトの設定
          'controller' => 'Users',
          'action' => 'login'
        ],
        'logoutRedirect' => [
          'controller' => 'Users',
          'action' => 'logout'
        ],
        'authError' => 'ログインしてください',
      ]);
    }

    //ログイン
    public function login(){
      //POST時の処理
      if($this->request->isPost()){
        $user = $this->Auth->identify();
        if(!empty($user)){
          $this->Auth->setUser($user);
          return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error('ユーザー名かパスワードが間違っています。');
      }
    }

    public function logout(){
      //セッション破棄
      $this->request->session()->destroy();
      return $this->redirect($this->Auth->logout);
    }

    //認証しないページ
    public function beforeFilter(Event $event){
      parent::beforeFilter($event);
      $this->Auth->allow([]);
    }

    //認証ロール
    public function isAuthorized($user = null){
      //管理者はtrue
      if($user['role'] === 'admin'){
        return true;
      }

      if($user['role'] === 'user'){
        if($this->name === 'Auction'){
          return true;
        } else {
        return false;
        }
      }
      //その他
      return false;
    }
  }
 ?>
