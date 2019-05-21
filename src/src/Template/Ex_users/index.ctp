<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <th>id</th><th>name</th><th>pass</th><th>role</th>
        </tr>
      </thead>
      <?php foreach ($data->toArray() as $obj): ?> <!-- $dataの各レコードを配列に格納して$objで一つずつ取り出す -->
        <tr>
          <td><?=h($obj->id) ?></td>
          <td><?=h($obj->name) ?></td>
          <td><?=h($obj->password) ?></td>
          <td><?=h($obj->role) ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </body>
</html>
