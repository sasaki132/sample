<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>This is People table records.</p>
    <?=$this->Form->create(null,
      ['type'=>'post',
      'url'=>['controller'=>'people',
          'action'=>'index']]) ?>
    <div>find</div>
    <div><?=$this->Form->text('People.find') ?></div>
    <div><?=$this->Form->submit('検索') ?></div>
    <?=$this->Form->end() ?>
    <hr>

    <p>TPhone</p>
    <table>
      <thead>
        <tr>
          <th><?=$this->Paginator->sort('id') ?></th>
          <th><?=$this->Paginator->sort('name') ?></th>
          <th><?=$this->Paginator->sort('mail') ?></th>
          <th><?=$this->Paginator->sort('age') ?></th>
          <th>message</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data->toArray() as $obj): ?>
          <tr>
            <td><?=h($obj->id) ?></td>
            <td><a href="<?=$this->Url->build(['controller'=>'People',
            'action'=>'edit']); ?>?id=<?=$obj->id ?>"><?=h($obj->name) ?></a></td>
            <td><?=h($obj->mail) ?></td>
            <td><?=h($obj->age) ?></td>
            <td><?php foreach($obj->messages as $item): ?>
              "<?=h($item->message) ?>"<br>
            <?php endforeach; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="paginator">
      <ul class="pagination">
        <?=$this->Paginator->first(' |<<'.'最初へ') ?>
        <?=$this->Paginator->prev(' <<'.'前へ') ?>
        <?=$this->Paginator->next('次へ'.' >>') ?>
        <?=$this->Paginator->last('最後へ'.' >>|') ?>
      </ul>
    </div>

  </body>
</html>
