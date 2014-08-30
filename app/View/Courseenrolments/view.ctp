<div class="courseenrolments view">
<h2><?php  echo __('Courseenrolment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($courseenrolment['Courseenrolment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseenrolment['Course']['id'], array('controller' => 'courses', 'action' => 'view', $courseenrolment['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Member'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseenrolment['Member']['memberName'], array('controller' => 'members', 'action' => 'view', $courseenrolment['Member']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($courseenrolment['Courseenrolment']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grade'); ?></dt>
		<dd>
			<?php echo h($courseenrolment['Courseenrolment']['grade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($courseenrolment['Courseenrolment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($courseenrolment['Courseenrolment']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Courseenrolment'), array('action' => 'edit', $courseenrolment['Courseenrolment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Courseenrolment'), array('action' => 'delete', $courseenrolment['Courseenrolment']['id']), null, __('Are you sure you want to delete # %s?', $courseenrolment['Courseenrolment']['id'])); ?> </li>
	</ul>
</div>
