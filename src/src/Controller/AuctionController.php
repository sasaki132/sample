<?php
  namespace App\Controller;
  use App\Controller\AppController;
  use Cake\Event\Event;
  use Exception;

  class AuctionController extends AuctionBaseController{
    //デフォルトテーブルを使わない
    public $useTable =  false;

    //初期化処理
    public function initialize(){
      parent::initialize();
      $this->loadComponent('Paginator');
      //必要なモデルをすべてロード
      $this->loadModel('Users');
      $this->loadModel('Biditems');
      $this->loadModel('Bidrequests');
      $this->loadModel('Bidinfo');
      $this->loadModel('Bidmessages');
      //ログインしてるユーザーをauthuserに設定
      $this->set('authuser',$this->Auth->user());
      //レイアウトをauctionに変更
      $this->viewBuilder()->setLayout('auction');
    }

    //トップページ
    public function index(){
      //ページネーションでBiditemsを取得
      $auction = $this->paginate('Biditems',[
        'order' => ['endtime'=>'desc'],
        'limit' => 10
      ]);
      $this->set(compact('auction')); //☆
    }

    //商品情報の表示
    public function view($id = null){
      //$idのBiditemを取得
      $biditem = $this->Biditems->get($id,[
        'contain' => ['Users', 'Bidinfo', 'Bidinfo.Users']
      ]);

      //オークション終了時の処理
      //終了日時が現在時刻より前　かつ　finishedフラグがfalseの時
      if($biditem->endtime < new \Datetime('now') and $biditem->finished == 0){ //ビューのactionを実行したときのnow
        //finishedを1に変更して保存
        $biditem->finished = 1;
        $this->Biditems->save($biditem);
        //bidinfoを作成
        $bidinfo = $this->Bidinfo->newEntity();
        //bidinfoのbiditem_idに$idを設定
        $bidinfo->biditem_id = $id;
        //最高金額のbidrequestを検索
        $bidrequest = $this->Bidrequests->find('all',[  //☆
          'conditions' => ['biditem_id' => $id],
          'contain' => ['Users'],
          'order' => ['price' => 'desc']])->first(); //find(~~)->first()：検索結果の最初の取得値！
          //bidrequestが得られた時の処理
          if(!empty($bidrequest)){
            //bidinfoの各種プロパティを設定して保存する
            $bidinfo->user_id = $bidrequest->user->id;
            $bidinfo->user = $bidrequest->user;
            $bidinfo->price = $bidrequest->price;
            $this->Bidinfo->save($bidinfo);
          }
          //Biditemのbidinfoに$bidinfoを設定
          $biditem->bidinfo = $bidinfo;
      }
      //bidrequestからbiditem_idがidのものを取得
      $bidrequests = $this->Bidrequests->find('all', [
        'conditions' => ['biditem_id'=>$id],
        'contain' => ['Users'],
        'order' => ['price' => 'desc']])->toArray();
        //オブジェクト類をテンプレート用に設定
        $this->set(compact('biditem','bidrequests'));
    }

    //出品する処理
    public function add(){
      //BidItemインスタンスを用意
      $biditem = $this->Biditems->newEntity();
      //post送信時の処理
      if($this->request->is('post')){
        $biditem = $this->Biditems->patchEntity($biditem,$this->request->getData());
        //$biditemを保存する
        if($this->Biditems->save($biditem)){
          //成功時のメッセージ
          $this->Flash->success(__('保存しました。'));
          //トップに(index)移動
          return $this->redirect(['action' => 'index']);
        }
        //失敗のメッセージ
        $this->Flash->error(__('保存に失敗しました。もう一度入力下さい。'));
      }
      //値を補完
      $this->set(compact('biditem'));
    }

    //入札の処理
    public function bid($biditem_id = null){
      //入札用のbidrequestインスタンスを用意
      $bidrequest = $this->Bidrequests->newEntity();
      //$bidrequestにbiditem_idとuser_idを設定
      $bidrequest->biditem_id = $biditem_id;
      $bidrequest->user_id = $this->Auth->user('id');
      //post送信時の処理
      if($this->request->is('post')){
        //bidrequestに送信ホームの内容を反映する
        $bidrequest = $this->Bidrequests->patchEntity($bidrequest, $this->request->getData());
        //bidrequestを保存
        if($this->Bidrequests->save($bidrequest)){
          //成功時のメッセージ
          $this->Flash->success(__('入札を送信しました。'));
          //topにリダイレクト
          return $this->redirect(['action' => 'view', $biditem_id]);
        }
        //失敗時のメッセージ
        $this->Flash->error(__('入札に失敗しました。もう一度入力ください'));
      }
      //biditem_idの$biditemを取得する
      $biditem = $this->Biditems->get($biditem_id);
      $this->set(compact('bidrequest','biditem'));
    }

    //落札者とのメッセージ
    public function msg($bidinfo_id = null){ //☆
      //bidmessageを新たに用意
      $bidmsg = $this->Bidmessages->newEntity();
      //post送信時の処理
      if($this->request->is('post')){//isPostとの使いわけ
        //送信されたフォームで$bidmsgを更新
        $bidmsg = $this->Bidmessages->patchEntity($bidmsg, $this->request->getData());
        //bidmessageを保存
        if($this->Bidmessages->save($bidmsg)){
          $this->Flash->success(__('保存しました。'));
        }else{
          $this->Flash->error(__('保存に失敗しました。もう一度入力ください'));
        }
      }
      try{
        $bidinfo = $this->Bidinfo->get($bidinfo_id,['contain'=>['Biditems']]);
      }catch(Exception $e){
        $bidinfo = null;
      }
      //bidmessageをbidinfo_idとuser_idで検索
      $bidmsgs = $this->Bidmessages->find('all',[
        'conditions'=>['bidinfo_id'=>$bidinfo_id],
        'contain'=>['Users'],
        'order'=>['created'=>'desc']]);
      $this->set(compact('bidmsgs','bidinfo','bidmsg'));
    }
    //落札情報の表示
    public function home(){
      //自分が落札したBidinfoをページネーションで取得
      $bidinfo = $this->paginate('Bidinfo',[
        'conditions'=>['Bidinfo.user_id'=>$this->Auth->user('id')],
        'contain'=>['Users','Biditems'],
        'order'=>['created'=>'desc'],
        'limit'=>10])->toArray();
      $this->set(compact('bidinfo'));
    }

    //出品情報の表示
    public function home2(){
      //自分が落札したBiditemをページネーションで取得
      $biditems = $this->paginate('Biditems',[
        'conditions'=>['Biditems.user_id'=>$this->Auth->user('id')],
        'contain'=>['Users','Bidinfo'],
        'order'=>['created'=>'desc'],
        'limit'=>10])->toArray();
      $this->set(compact('biditems'));
    }

    //ログアウトしてリダイレクト
    
  }
 ?>
