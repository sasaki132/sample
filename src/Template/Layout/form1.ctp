<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <?=$this->Html->charset() ?>
    <title><?=$this->fetch('title')?></title>
    <?=$this->Html->css('layouttest') ?>
    <?=$this->Html->script('layouttest') ?>
  </head>
  <body>
    <header class="head row">
      <?=$this->element('header', ['subtitle'=>'Form Sample']) ?>
    </header>
    <div class="content row">
      <?=$this->fetch('content') ?> <!-- indexのviewTemplateがcontentとして取り出される -->
    </div>
    <footer class="foot row">
      <?=$this->element('footer', ['copyright'=>'2019 namae']) ?>
    </footer>
  </body>
</html>
