<!-- フォームヘルパーを作成
    create(Model,form属性の連想配列[type,url])
    'type'=>post or get?,
    'url'=>[controller,遷移先action]-->
<?=$this->Form->create($entity,
  ['type'=>'post',
  'url'=>['controller'=>'staff',
  'action'=>'create']]) ?>

<div>name</div>
<div><?=$this->Form->text('Staff.name') ?></div>
<div>phone</div>
<div><?=$this->Form->text('Staff.phone') ?></div>
<div><?=$this->Form->submit('送信') ?></div>
<?=$this->Form->end() ?>
