<div class="users form">
  <?=$this->Flash->render('auth') ?> <!-- ログイン時のエラーメッセージの表示 -->
  <?=$this->Form->create() ?>
  <fieldset>
    <legend>アカウントとパスワードを入力してください。</legend>
    <?=$this->Form->input('username') ?>
    <?=$this->Form->input('password') ?>
  </fieldset>
  <?=$this->Form->button(__('Login')); ?>
  <?=$this->Form->end() ?>
</div>
