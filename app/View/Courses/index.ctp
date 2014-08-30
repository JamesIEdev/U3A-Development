<div class="courses index">
	<h2><?php echo __('Courses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_code'); ?></th>
			<th><?php echo $this->Paginator->sort('course_name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('max_enrol_limit'); ?></th>
			<th><?php echo $this->Paginator->sort('difficulty'); ?></th>
			<th><?php echo $this->Paginator->sort('prerequisites'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($courses as $course): ?>
	<tr>
		<td><?php echo h($course['Course']['id']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['course_code']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['course_name']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['description']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['max_enrol_limit']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['difficulty']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['prerequisites']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $course['Course']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $course['Course']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 
				$course['Course']['id']), null, __('Remove "%s?', $course['Course']['course_name']."\" from Courses")); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
		<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Course Files (Build 4.0)'), array('controller' => 'coursefiles', 'action' => 'index')); ?> </li>
	</ul>
</div>
