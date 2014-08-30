<div class="courseenrolments form">
<?php echo $this->Form->create('Courseenrolment'); ?>
	<fieldset>
		<legend><?php echo __('Add Course Enrolment'); ?></legend>
	<?php
		echo $this->Form->input('course_id', array('label' => 'Course: '));
		echo $this->Form->input('member_id', array('label' => 'Member: '));
		echo $this->Form->input('status', array('label' => 'Status: '));
		echo $this->Form->input('grade', array('label' => 'Grade: '));
	?>
	</fieldset>
	<p></p>
	<?php echo $this->Form->end(__('Add')); ?>
<div class="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?></li>
	</ul>
</div>
