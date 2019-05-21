<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
  public function initialize(){
    parent::initialize();
    //各種コンポーネントのロード
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash'); //エラーや成功時のメッセージをページ上に表示する
    $this->loadComponent('Auth',[ //コンポーネント名Auth
      'authorize' => ['Controller'],  //連想配列1:読み込みの設定
      'authenticate' => [
        'Form' => [
          'fields' => [
            'username' => 'username',
            'password' => 'password'
          ]
        ]
      ],
      'loginRedirect' => [
        'controller' => 'Users',
        'action' => 'login'
      ],
      'logoutRedirect' =>[
        'controller' => 'Users',
        'action' => 'logout',
      ],
      'authError' => 'ログインして下さい。',
    ]);
  }

  //ログイン処理
  public function login(){
    //POST時の処理
    if($this->request->isPost()){
      $user = $this->Auth->identify();
      //Authのidentifyをユーザーに設定
      if($user){
        $this->Auth->setUser($user);
        if($this->isAuthorized($user) === true){
          return $this->redirect($this->Auth->redirectUrl('/users'));
        }else{
          return $this->redirect($this->Auth->redirectUrl('/auction'));
        }

      }
      $this->Flash->error('ユーザー名かパスワードが間違っています');
    }
  }

  //ログアウト処理
  public function logout(){
    //セッション破棄
    $this->request->session()->destroy();
    return $this->redirect($this->Auth->logout());
  }

  //認証を使わないページの設定
  public function beforeFilter(Event $event){
    parent::beforeFilter($event);
    // $this->Auth->allow(['login','index','add']); //最初はこれ。adminを登録してから後でadd削除
    $this->Auth->allow(['login']);
  }

  //認証時のロールチェック
  public function isAuthorized($user = null){
    //管理者はtrue
    if($user['role'] === 'admin'){
      return true;
    }
    //一派ユーザーはfalse
    if($user['role'] === 'user'){
      return false;
    }
    //他すべてfalse
    return false;
  }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Bidinfo', 'Biditems', 'Bidmessages', 'Bidrequests']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
