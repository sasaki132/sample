<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3><a href="<?=$this->Url->build(['controller'=>'Myblogs',
    'action'=>'blog']); ?>">ブログ一覧</a></h3>
    <h3><a href="<?=$this->Url->build(['controller'=>'Myblogs',
    'action'=>'search']); ?>">ブログ検索</a></h3>
    <h3><a href="<?=$this->Url->build(['controller'=>'Myblogs',
    'action'=>'add']); ?>">ブログ書込み</a></h3>
    <h3><a href="<?=$this->Url->build(['controller'=>'Myblogs',
    'action'=>'delete']); ?>">ブログ削除</a></h3>
  </body>
</html>
