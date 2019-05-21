<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?=$this->Form->create(null,['type'=>'post', 'url'=>['controller'=>'Form1', 'action'=>'form']]) ?>
    Name<?=$this->Form->controll('name') ?>
    <?=$this->Form->submit('submit') ?>
    <?=$this->Form->end() ?>
  </body>
</html>
