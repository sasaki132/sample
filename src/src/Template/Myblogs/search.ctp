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
    'action'=>'search']]) ?>
    検索ID:<?=$this->Form->text('Myblogs.find') ?>
    <?=$this->Form->submit('検索') ?>
    <?=$this->Form->end() ?>

    <?php foreach ($data->toArray() as $obj): ?>
      <h3><?=h($obj->title) ?> [<?=h($obj->id) ?>]</h3>
      <h4><?=h($obj->abstract) ?></h4>
      <h5><?=h($obj->content) ?></h5>
      <p><?=h($obj->created) ?></p>
    <?php endforeach; ?>
  </body>
</html>
