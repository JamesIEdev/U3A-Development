<div class="courseenrolments form">
<?php echo $this->Form->create('Courseenrolment'); ?>
	<fieldset>
		<legend><?php echo __('Add Course Enrolment'); ?></legend>
	<?php
		$user = $this->Session->read('Auth.User'); 
		echo $this->Form->input('course_id', array('label' => 'Course: '));
		echo $this->Form->hidden('member_id', array('label' => 'Member: ', 'value' => $user['member_id']));
		echo $this->Form->hidden('status', array('label' => 'Status: ', 'value' => "ENROLLED"));
		echo $this->Form->hidden('grade', array('label' => 'Grade: '));
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
