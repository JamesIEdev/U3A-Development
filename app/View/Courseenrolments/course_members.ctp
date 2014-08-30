<div class="courseenrolments index">
	<h2><?php echo __('Course Enrolments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('member_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('grade'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		foreach ($courseenrolments as $courseenrolment):
		if ($courseenrolment['Courseenrolment']['course_id'] == 2) {
	?>
	<tr>

		<td><?php echo h($courseenrolment['Courseenrolment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($courseenrolment['Course']['courseName'], array('controller' => 'courses', 'action' => 'view', $courseenrolment['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($courseenrolment['Member']['memberName'], array('controller' => 'members', 'action' => 'view', $courseenrolment['Member']['id'])); ?>
		</td>
		<td><?php echo h($courseenrolment['Courseenrolment']['status']); ?>&nbsp;</td>
		<td><?php echo h($courseenrolment['Courseenrolment']['grade']); ?>&nbsp;</td>
		<td><?php echo h($courseenrolment['Courseenrolment']['created']); ?>&nbsp;</td>
		<td><?php echo h($courseenrolment['Courseenrolment']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $courseenrolment['Courseenrolment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $courseenrolment['Courseenrolment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $courseenrolment['Courseenrolment']['id']), null, __('Are you sure you want to delete # %s?', $courseenrolment['Courseenrolment']['id'])); ?>
		</td>
	</tr>
<?php
	} 
	endforeach; 
?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<p></p>
<div class="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('New Course Enrolment (Course Conveyor)'), array('action' => 'add')); ?></li>
	</ul>
</div>
