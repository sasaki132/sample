<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <?=$this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <title><?=$this->name . '/' . $this->request->action ?></title>
    <?=$this->Html->meta('icon') ?>
    <?=$this->Html->css('base.css') ?>
    <?=$this->Html->css('myblogs.css') ?>
    <?=$this->fetch('meta') ?>
    <?=$this->fetch('css') ?>
    <?=$this->fetch('script') ?>
  </head>
  <body>
    <p style="margin:0px;padding:0px;"><?=h(date('j F Y', strtotime($date))) ?></p>
    <div class="header" style="background-color: #2e2e6a;margin:0px 10px 0px 10px;">
      <h1 style="font-size:30pt;color:white;margin:0px 20px;">MyBlog</h1>
    </div>
    <div class="link" style="background-color: #ddd;margin:0px 10px 20px 10px;">
      <?=$this->Html->link(__('トップ画面へ'),['action' => 'index']) ?>
    </div>



    <?=$this->Flash->render() ?>
    <div class="container clearfix">
      <div class="actions index medium-9 columns content">
        <?=$this->fetch('content') ?>
      </div>
      <nav class="large-2 medium-3 columns sidebar" id="actions-sidebar">
        <ul class="side-nav">
          <li class="heading"><?= __('Actions') ?></li>
          <li><?=$this->Html->link(__('ブログ一覧'),['action' => 'blog']) ?></li>
          <li><?=$this->Html->link(__('検索'),['action' => 'search']) ?></li>
          <li><?=$this->Html->link(__('ブログ書込み'),['action' => 'add']) ?></li>
          <li><?=$this->Html->link(__('ブログ削除'),['action' => 'delete']) ?></li>
          <hr>
          <li><?=$this->Html->link(__('トップ画面に戻る'),['action' => 'index']) ?></li>
        </ul>
      </nav>
    </div>
    <footer></footer>
  </body>
</html>
