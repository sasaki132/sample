
<h2>ミニオークション</h2>
<h3>※出品されている商品</h3>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users','action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users','action' => 'logout']) ?></li>
        <hr>
        <li><?= $this->Html->link(__('Auction'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('出品する'), ['controller' => 'Bidrequests', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
<table cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th class="main" scope="col"><?=$this->Paginator->sort('name') ?></th>
      <th scope="col"><?=$this->Paginator->sort('finished') ?></th>
      <th scope="col"><?=$this->Paginator->sort('endtime') ?></th>
      <th scope="col" class="actions"><?=__('Actions') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($auction as $biditem): ?>
      <tr>
        <td><?=h($biditem->name) ?></td>
        <td><?=h($biditem->finished ? 'Finished':'') ?></td>
        <td><?=h($biditem->endtime) ?></td>
        <td class="actions">
          <?=$this->Html->link(__('View'), ['action'=>'view',$biditem->id]) ?>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>
<div class="paginator">
  <ul class="pagination">
    <?=$this->Paginator->first('<< '. __('first')) ?>
    <?=$this->Paginator->prev('< '. __('previous')) ?>
    <?=$this->Paginator->numbers() ?>
    <?=$this->Paginator->next(__('next'). ' >') ?>
    <?=$this->Paginator->last(__('last'). ' >>') ?>
  </ul>
</div>
