<?=$this->Form->create($entity,
  ['type'=>'post',
  'url'=>['controller'=>'staff',
  'action'=>'update']]) ?>

<div><?=$this->Form->text('Staff.code') ?></div>
<div>name</div>
<div><?=$this->Form->text('Staff.name') ?></div>
<div>phone</div>
<div><?=$this->Form->text('Staff.phone') ?></div>
<div><?=$this->Form->submit('送信') ?></div>
<?=$this->Form->end() ?>
