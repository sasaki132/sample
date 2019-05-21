<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Logout'), ['action' => 'logout']) ?></li>
        </ul>
    </nav>
  <div class="users form large-9 medium-8 columns content">
      <?= $this->Form->create($user) ?>
      <fieldset>
          <legend><?= __('Add User') ?></legend>
          <?php
              echo $this->Form->control('username');
              echo $this->Form->control('password');
              echo $this->Form->control('role');
          ?>
      </fieldset>
      <?= $this->Form->button(__('Submit')) ?>
      <?= $this->Form->end() ?>
  </div>


  </body>
</html>
