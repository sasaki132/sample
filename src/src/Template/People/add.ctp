<p><?=$msg ?></p>
<?=$this->Form->create($entity,
  ['type'=>'post',
  'url'=>['controller'=>'people',
      'action'=>'add']]) ?>
<fieldset class="form">
  NAME: <?=$this->Form->error('People.name') ?>
  <?=$this->Form->text('People.name') ?>
  Mail: <?=$this->Form->error('People.mail') ?>
  <?=$this->Form->text('People.mail') ?>
  Age: <?=$this->Form->error('People.age') ?>
  <?=$this->Form->text('People.age') ?>
  <?=$this->Form->submit('送信') ?>
</fieldset>
<?=$this->Form->end() ?>
