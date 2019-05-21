<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?=$this->Form->create(null,
    ['type'=>'post',
    'url'=>['controller'=>'Myblogs',
    'action'=>'delete']]) ?>
    削除ID:<?=$this->Form->text('Myblogs.find') ?>
    <?=$this->Form->submit('送信') ?>
    <?=$this->Form->end() ?>

  </body>
</html>
