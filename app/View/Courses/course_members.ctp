<div class="courses form">
	<h2>Enrolled Courses</h2>
	<table id="table_id3" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>Course Name</th>
				<th>Member Name</th>
				<th>Status</th>
				<th>Grade</th>
				<th>Created</th>
				<th>Modified</th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($course['Courseenrolment'] as $member): 
				if ($member['course_id'] == $course['Course']['id']) {
			?>
			<tr>
				<td>
					<?php echo $this->Html->link($member['course_id'], array('controller' => 'courses', 'action' => 'view', $member['course_id'])); ?>
				</td>
				<td>
					<?php echo $this->Html->link($member['member_id'], array('controller' => 'members', 'action' => 'view', $member['member_id'])); ?>
				</td>
				<td><?php echo $member['status']; ?></td>
				<td><?php echo $member['grade']; ?></td>
				<td><?php echo $member['created']; ?></td>
				<td><?php echo $member['modified']; ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'courseenrolments', 'action' => 'view', $member['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'courseenrolments', 'action' => 'edit', $member['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), 
						array('action' => 'delete', $member['id']), null, __('Are you sure you want to delete # %s?', $member['id'])); ?>
				</td>
			</tr>
		</tbody>
			<?php 
				}
				endforeach; 
			?>
	</table>
</div>