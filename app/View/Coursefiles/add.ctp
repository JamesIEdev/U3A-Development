<div class="coursefiles form">
<?php echo $this->Form->create('Coursefile'); ?>
	<fieldset>
		<legend><?php echo __('Add Coursefile'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Coursefiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
