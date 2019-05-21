<section>
<h1>スケジュール追加</h1>
<?=$this->Form->create($entity,
	['type'=>'post',
	'url'=>['controller'=>'Schedules',
		'action'=>'index']]) ?>
	<fieldset class="form">
		course
		<?= $this->Form->error('Schedules.course_id') ?>
		<?=$this->Form->text('Schedules.course_id') ?>
    staff
		<?= $this->Form->error('Schedules.staff_id') ?>
		<?=$this->Form->text('Schedules.staff_id') ?>
    start_date
		<?= $this->Form->error('Schedules.start_date') ?>
		<?=$this->Form->text('Schedules.start_date') ?>
    end_date
		<?= $this->Form->error('Schedules.end_date') ?>
		<?=$this->Form->text('Schedules.end_date') ?>

		<?=$this->Form->submit('スケジュール追加') ?>
	</fieldset>
<?=$this->Form->end() ?>

<hr>
<table>
<thead><tr>
	<th>code</th><th>staff</th><th>course</th><th>start_date</th><th>end_date</th>
</tr></thead>
<?php foreach($data->toArray() as $obj): ?>
<tr>
	<td><?=h($obj->code) ?></td>
	<td><?=h($obj->staff->name) ?></td>
	<td><?=h($obj->course->title) ?></td>
	<td><?=h(date('Y-m-d', strtotime($obj->start_date))) ?></td>
  <td><?=h(date('Y-m-d', strtotime($obj->end_date))) ?></td>
</tr>
<?php endforeach; ?>
</table>
