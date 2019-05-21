<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>1行掲示板</h2>
    <?=$this->Form->create($entity,
    ['type'=>'post',
    'url'=>['controller'=>'comments',
    'action'=>'index']]) ?>
    <div>名前: <?=$this->Form->text('Comments.name') ?></div>
    <div>投稿内容: <?=$this->Form->text('Comments.text') ?></div>
    <?=$this->Form->submit('投稿') ?>
    <?=$this->Form->end() ?>
    <hr>
    <table>
      <?php foreach ($data->toArray() as $obj): ?>
        <tr>
          <td><?=h($obj->name) ?> : </td>
          <td><?=h($obj->text) ?> - </td>
          <td><?=h(date('Y-m-d H:i:s', strtotime($obj->date))) ?></td>
        </tr>
      <?php endforeach; ?>
    </table>

  </body>
</html>
