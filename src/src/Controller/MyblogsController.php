<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Myblogs Controller
 *
 * @property \App\Model\Table\MyblogsTable $Myblogs
 *
 * @method \App\Model\Entity\Myblog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MyblogsController extends AppController
{
    public function initialize(){
      //header
      $this->set('date', new Time(date('Y-m-d H:i:s')));
      parent::initialize();
      $this->viewBuilder()->setLayout('myblogs');
    }
    public function index()
    {


        $myblogs = $this->paginate($this->Myblogs);
        $this->set(compact('myblogs'));
    }

    public function search(){
      $myblogs = $this->paginate($this->Myblogs);
      $this->set(compact('myblogs'));
      //idがpostされたら受け取った値で記事を検索
      //あった分だけ抽出して表示
      if($this->request->is('post')){
        $find = $this->request->data['Myblogs']['find'];
        $condition = ['conditions' => ['id'=>$find]];
        $data = $this->Myblogs->find('all',$condition);
      }else{
        $data = $this->Myblogs->find('all');
      }
      $this->set('data', $data);

    }
    /**
     * View method
     *
     * @param string|null $id Myblog id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $myblog = $this->Myblogs->get($id, [
            'contain' => []
        ]);

        $this->set('myblog', $myblog);
    }

    public function blog(){
      //header
      $this->set('date', new Time(date('Y-m-d H:i:s')));

      $myblogs = $this->paginate($this->Myblogs);
      $this->set(compact('myblogs'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $myblog = $this->Myblogs->newEntity();
        if ($this->request->is('post')) {
            $myblog = $this->Myblogs->patchEntity($myblog, $this->request->getData());
            if ($this->Myblogs->save($myblog)) {
                $this->Flash->success(__('The myblog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The myblog could not be saved. Please, try again.'));
        }
        $this->set(compact('myblog'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Myblog id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $myblog = $this->Myblogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $myblog = $this->Myblogs->patchEntity($myblog, $this->request->getData());
            if ($this->Myblogs->save($myblog)) {
                $this->Flash->success(__('The myblog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The myblog could not be saved. Please, try again.'));
        }
        $this->set(compact('myblog'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Myblog id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

      $myblogs = $this->paginate($this->Myblogs);
      $this->set(compact('myblogs'));
      //idがpostされたら受け取った値で記事を検索
      //あった分だけ抽出して表示
      if($this->request->is('post')){
        $find = $this->request->data['Myblogs']['find'];
        $condition = ['conditions' => ['id'=>$find]];
        $data = $this->Myblogs->find('all',$condition)->first();
        if ($this->Myblogs->delete($data)) {
            $this->Flash->success(__('The myblog has been deleted.'));
        } else {
            $this->Flash->error(__('The myblog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'blog']);
      }

    }
}
