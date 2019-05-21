<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="users form">
      <?=$this->Form->create() ?>
        <fieldset>
          <legend>アカウント名とパスワードを入力してください。</legend>
          <?=$this->Form->input('username') ?>
          <?=$this->Form->input('password') ?>
        </fieldset>
      <?=$this->Form->button(__('Login'));  ?>
      <?=$this->Form->end() ?>
    </div>
  </body>
</html>
