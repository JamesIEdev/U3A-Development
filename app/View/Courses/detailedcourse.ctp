<!doctype html>
<html lang="en">
<head>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#tabs").tabs();
		});	
	</script>
</head>

<body>
	<p></p>
	<div id="tabcont" type="container">
		<div id="tabs" align="left">
			<ul>
				<li><a href="#tabs1">Details</a></li>
				<li><a href="#tabs2">List Members</a></li>
				<li><a href="#tabs3"><?php echo $this->Html->link(__('Return to Courses'), array('action' => 'index')); ?></a></li>
				
			</ul>

			<div id="tabs1";>
				<div class="courses view">
				<h2><?php echo $course['Course']['course_code']." - ".$course['Course']['course_name'] ?></h2>
					<table width="80%"> 
						<tr> 
							<td class="heading" width="20%">ID:</td> 
							<td class="data"><?php echo h($course['Course']['id']); ?></td> 
						</tr> 
						<tr> 
							<td class="heading" width="20%">Course Code:</td> 
							<td class="data"><?php echo h($course['Course']['course_code']); ?></td> 
						</tr> 
						<tr> 
							<td class="heading" width="20%">Course Name:</td> 
							<td class="data"><?php echo h($course['Course']['course_name']); ?></td> 
						</tr> 
						<tr> 
							<td class="heading" width="20%">Description:</td> 
							<td class="data"><?php echo h($course['Course']['description']); ?></td> 
						</tr> 
						<tr> 
							<td class="heading" width="20%">Currently Enrolled:</td> 
							<td class="data">
								<?php $num = 0;
									foreach ($course['Courseenrolment'] as $member): 
										if ($member['course_id'] == $course['Course']['id']) {
											$num = $num + 1;
										}
									endforeach;
								?>
								<?php echo $num; ?>&nbsp;/&nbsp;<?php echo h($course['Course']['max_enrol_limit']); ?>
							</td>
						</tr> 
						<tr> 
							<td class="heading" width="20%">Difficulty:</td> 
							<td class="data"><?php echo h($course['Course']['difficulty']); ?></td> 
						</tr>
						<tr> 
							<td class="heading" width="20%">Pre-requisites:</td> 
							<td class="data"><?php echo h($course['Course']['prerequisites']); ?></td> 
						</tr>
					</table>
				</div>


					


			<div id="submitButtons">
				<button>
					<?php echo $this->Html->link(__('Enrol'), array('action' => 'enrol_now', $course['Course']['id'])); ?></a>
				</button>
				<button>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $course['Course']['id'])); ?></a>
				</button>
				<button type="submit">
					<?php
						echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), 
							null, __('Are you sure you want to delete: %s?', 
								$course['Course']['course_code']." - ".$course['Course']['course_name'])); 
					?></a>
				</button>
			</div>
		</div>

	<div id="tabs2";>
		<div class="courses form">
			<h2><?php echo "Members enrolled under: ".$course['Course']['course_code']." - ".$course['Course']['course_name'] ?></h2>
			<table id="table_id3" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
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
							<?php echo $this->Html->link($member['member_id'], array('controller' => 'members', 'action' => 'detailedmember', $member['member_id'])); ?>
						</td>
						<td><?php echo $member['status']; ?></td>
						<td><?php echo $member['grade']; ?></td>
						<td><?php echo $member['created']; ?></td>
						<td><?php echo $member['modified']; ?></td>

						<td class="actions">
							<?php echo $this->Html->link(__('View'), array('controller' => 'courseenrolments', 'action' => 'detailedmember', $member['id'])); ?>
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
		</div>
	</div>
</div>
</body>
</html>


