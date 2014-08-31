<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>jQuery UI Tabs - Default functionality</title>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

	<script> $(function() {
		$("#tabs").tabs();
	});	
	</script>
</head>

<body>
	<div id="tabcont" type="container">
		<div id="tabs" align="left">
			<ul>
				<li><a href="#tabs1">List Courses</a></li>
				<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?></li>
			</ul>

			<div id="tabs1">
				<div class="courses index">
					<h2><?php echo __('Courses'); ?></h2>
					<table  id="table_id1" cellpadding="0" cellspacing="0">
						<thead>
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
					</thead>
						<?php foreach ($courses as $course): ?>
						<tbody>
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
					</tbody>
					<?php endforeach; ?>
				</table>


			</div>
		</div>
	</div>
</body>
