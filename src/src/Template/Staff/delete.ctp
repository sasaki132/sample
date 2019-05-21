<p>※以下のレコードを削除しますか？</p>
<div>id: <?=$entity['code'] ?></div>
<div>name: <?=$entity['name'] ?></div>
<div>phone: <?=$entity['phone'] ?></div>
<hr>
<?=$this->Form->create($entity,
  ['type'=>'post',
  'url'=>['controller'=>'staff',
      'action'=>'destroy']]) ?>
<?=$this->Form->hidden('Staff.code') ?>
<div><?=$this->Form->submit('削除する') ?></div>
<?=$this->Form->end() ?>
