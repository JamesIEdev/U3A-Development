<div class="coursefiles form">
<?php echo $this->Form->create('Coursefile'); ?>
	<fieldset>
		<legend><?php echo __('Edit Coursefile'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('course_id');
		echo $this->Form->input('notes');
		echo $this->Form->input('attachments');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Coursefile.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Coursefile.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Coursefiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
