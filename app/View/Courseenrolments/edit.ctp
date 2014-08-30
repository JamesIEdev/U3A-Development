<div class="courseenrolments form">
<?php echo $this->Form->create('Course Enrolment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Course Enrolment'); ?></legend>
	<?php
		echo $this->Form->hidden('id', array('value' => $this->data['Courseenrolment']['id']));
		echo $this->Form->input('course_id', array('label' => 'Course: ', 'value' => $this->data['Courseenrolment']['course_id']));
		echo $this->Form->input('member_id', array('label' => 'Member: ', 'value' => $this->data['Courseenrolment']['member_id']));
		echo $this->Form->input('status', array('label' => 'Status: ', 'value' => $this->data['Courseenrolment']['status']));
		echo $this->Form->input('grade', array('label' => 'Grade: ', 'value' => $this->data['Courseenrolment']['grade']));
	?>
	</fieldset>
	<p></p>
	<?php echo $this->Form->end(__('Confirm Edit')); ?>
<div class="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Courseenrolment.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Courseenrolment.id'))); ?></li>
	</ul>
</div>
