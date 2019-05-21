<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>1行掲示板</h2>
    <?=$this->Form->create(null,
    ['type'=>'post',
    'url'=>['controller'=>'comments',
    'action'=>'add']]) ?>
    <div>名前: <?=$this->Form->text('Comments.name') ?></div>
    <div>投稿内容: <?=$this->Form->text('Comments.text') ?></div>
    <?=$this->Form->hidden('Comments.date') ?>
    <?=$this->Form->submit('投稿') ?>
    <?=$this->Form->end() ?>
    <hr>
  </body>
</html>
