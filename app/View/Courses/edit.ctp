<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Edit Course'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('course_code', array('label' => 'Course Code: '));
		echo $this->Form->input('course_name', array('label' => 'Course Name: '));
		echo $this->Form->input('description', array('label' => 'Description: '));
		echo $this->Form->input('max_enrol_limit', array('label' => 'Max Enrol Limit: '));
		echo $this->Form->input('difficulty', array('label' => 'Difficulty: '));
		echo $this->Form->input('prerequisites', array('label' => 'Pre-requisites: '));
	?>
	</fieldset>
	<p></p>
	<?php echo $this->Form->end(__('Confirm Edit')); ?>
<div class="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Back'), array('action' => 'detailedcourse/', $id)); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Course.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Course.id'))); ?></li>
	</ul>
</div>
