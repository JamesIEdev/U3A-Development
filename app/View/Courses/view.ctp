<div class="courses view">
<h2><?php  echo __('Course'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Code'); ?></dt>
		<dd>
			<?php echo h($course['Course']['course_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Name'); ?></dt>
		<dd>
			<?php echo h($course['Course']['course_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($course['Course']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Enrol Limit'); ?></dt>
		<dd>
			<?php echo h($course['Course']['max_enrol_limit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Difficulty'); ?></dt>
		<dd>
			<?php echo h($course['Course']['difficulty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prerequisites'); ?></dt>
		<dd>
			<?php echo h($course['Course']['prerequisites']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<p></p>
<div class="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?> </li>
		<li>
			<?php 
				echo $this->Html->link(__('List Members'), 
				array('controller' => 'courses', 'action' => 'course_members', $course['Course']['id'])); 
			?>
		</li>
		<li><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?> </li>
	</ul>
</div>

<br>

<div class="related">
	<h2><?php echo __('Related Coursefiles'); ?></h2>
	<?php if (!empty($course['Coursefile'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Attachments'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($course['Coursefile'] as $coursefile): ?>
		<tr>
			<td><?php echo $coursefile['id']; ?></td>
			<td><?php echo $coursefile['course_id']; ?></td>
			<td><?php echo $coursefile['notes']; ?></td>
			<td><?php echo $coursefile['attachments']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'coursefiles', 'action' => 'view', $coursefile['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'coursefiles', 'action' => 'edit', $coursefile['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'coursefiles', 'action' => 'delete', $coursefile['id']), null, __('Are you sure you want to delete # %s?', $coursefile['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	</table>
</div>

<p></p>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Add Course File'), array('controller' => 'coursefiles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
