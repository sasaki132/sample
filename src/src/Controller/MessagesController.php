<?php
  namespace App\Controller;
  use App\Controller\AppController;
  use Cake\I18n\Time;

  class MessagesController extends AppController{
    //一覧表示と新規レコードの挿入両方の処理を行う
    public function index(){
      if($this->request->is('post')){ //POST送信がされたら
        $data = $this->request->data['Messages']; //person_idとmessageが入ったデータを
        $entity = $this->Messages->newEntity($data); //入力データに基づいて新たなmessagesEntityを作成
        //messageentityのcreateプロパティに現日付時刻の情報を代入(タイムオブジェクト作成) / php標準のdate関数を利用
        $entity->created_at = new Time(date('Y-m-d H:i:s'));
        $this->Messages->save($entity); //データベースに保存
      }else{ //初期状態だったら
        $entity = $this->Messages->newEntity(); //新しくエンティティを作っておく
      }
      //送信ボタンが押しても押されなくても
      $data = $this->Messages->find('all') //Messagesテーブルのすべてのレコードを検索
        ->contain(['People']) //containメソッド
        ->order(['created_at'=>'desc']); //更新日時の降順に並べ替え
      $this->set('data',$data);
      $this->set('entity',$entity);
    }
  }
 ?>
