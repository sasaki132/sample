<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>This is Staff table records</p>
    <table>
      <thead>
        <tr>
          <th>code</th><th>name</th><th>phone</th><th></th>
        </tr>
      </thead>
      <?php foreach ($data->toArray() as $obj): ?>
        <tr>
          <td><?=h($obj->code) ?></td>
          <td><a href="<?=$this->Url->build(['controller'=>'Staff',
          'action'=>'edit']); ?>?id=<?=$obj->code ?>">
        <?=h($obj->name) ?></a></td>
          <td><?=h($obj->phone) ?></td>
          <td><a href="<?=$this->Url->build(['controller'=>'Staff',
          'action'=>'delete']) ?>?id=<?=$obj->code ?>">delete</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </body>
</html>
