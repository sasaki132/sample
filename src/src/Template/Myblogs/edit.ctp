<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Myblog $myblog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $myblog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $myblog->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Myblogs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="myblogs form large-9 medium-8 columns content">
    <?= $this->Form->create($myblog) ?>
    <fieldset>
        <legend><?= __('Edit Myblog') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('abstract');
            echo $this->Form->control('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
