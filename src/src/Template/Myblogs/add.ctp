<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Myblog $myblog
 */
?>

<div class="myblogs form large-9 medium-8 columns content">
    <?= $this->Form->create($myblog) ?>
    <fieldset>
        <legend><?= __('Add Myblog') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('abstract');
            echo $this->Form->control('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
