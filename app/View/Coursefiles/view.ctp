<div class="coursefiles view">
<h2><?php  echo __('Coursefile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coursefile['Coursefile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursefile['Course']['id'], array('controller' => 'courses', 'action' => 'view', $coursefile['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($coursefile['Coursefile']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachments'); ?></dt>
		<dd>
			<?php echo h($coursefile['Coursefile']['attachments']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coursefile'), array('action' => 'edit', $coursefile['Coursefile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Coursefile'), array('action' => 'delete', $coursefile['Coursefile']['id']), null, __('Are you sure you want to delete # %s?', $coursefile['Coursefile']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Coursefiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coursefile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
