<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header class="header row">
      <?=$this->element('myblogsHeader') ?>
    </header>

    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('New Myblog'), ['action' => 'add']) ?></li>
        </ul>
    </nav>
    <div class="myblogs index large-9 medium-8 columns content">
        <h3><?= __('Myblogs') ?></h3>

            <?php foreach ($myblogs as $myblog): ?>
            <h3><?= h($myblog->title) ?> [<?= $this->Number->format($myblog->id) ?>]</h3>
            <h4><?= h($myblog->abstract) ?></h4>
            <h5><?= h($myblog->content) ?></h5>
            <p><?= h($myblog->created) ?></p>
            <?= $this->Html->link(__('View'), ['action' => 'view', $myblog->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $myblog->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $myblog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $myblog->id)]) ?>
            <?php endforeach; ?>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>

  </body>
</html>
