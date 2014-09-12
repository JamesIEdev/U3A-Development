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
				<li><a href="#tabs2">Enrollments</a></li>
				<li><a href="#tabs3"><?php echo $this->Html->link(__('Members'), array('action' => 'index')); ?></a></li>
				
			</ul>

			<div id="tabs1";>
				<div class="members index">
					<h2>
						<?php echo h($member['Member']['member_fname']); ?>,  
						<?php echo h($member['Member']['member_gname']); ?>
						<?php echo h($member['Member']['member_mname']); ?>
					</h2>

					<table width="80%"> 
						<tr> 
							<td class="heading" width="20%">Name:</td> 
							<td class="data"><?php echo h($member['Member']['member_gname']); ?></td> 
						</tr> 
						<tr> 
							<td class="heading" width="20%">Middle Name:</td> 
							<td class="data"><?php echo h($member['Member']['member_mname']); ?></td> 
						</tr> 
						<tr> 
							<td class="heading" width="20%">Last Name:</td> 
							<td class="data"><?php echo h($member['Member']['member_fname']); ?></td> 
						</tr>
						<tr>
							<td class="heading" width="20%"></td> 
							<td class="data"><br></td> 
						</tr> 
						<tr> 
							<td class="heading" width="20%">Address:</td> 
							<td class="data"><?php echo h($member['Member']['member_address']); ?></td> 
						</tr> 
						<tr> 
							<td class="heading" width="20%">Postcode:</td> 
							<td class="data"><?php echo h($member['Member']['member_postcode']); ?></td> 
						</tr> 
						<tr>
							<td class="heading" width="20%"></td> 
							<td class="data"><br></td> 
						</tr> 
						<tr> 
							<td class="heading" width="20%">Email:</td> 
							<td class="data"><?php echo h($member['Member']['member_email']); ?></td> 
						</tr> 
						<tr> 
							<td class="heading" width="20%">Phone:</td> 
							<td class="data"><?php echo h($member['Member']['member_phone']); ?></td> 
						</tr>
						<tr> 
							<td class="heading" width="20%">Mobile:</td> 
							<td class="data"><?php echo h($member['Member']['member_mobile']); ?></td> 
						</tr>
					</table>
				</div>

		<div id="submitButtons">
			<button><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $member['Member']['id'])); ?></a></button>
			
			<?php if ($member['Member']['active'] < 1) {
			?>
				<button><?php echo $this->Html->link(__('Activate'), array('action' => 'Activate', $member['Member']['id'])); ?></a></button>
			<?php 
					}; 
			?>

            <button>
 				<?php

                if($is_superuser){
       				echo $this->Form->postLink(__('Reset Password'), array('controller'=>'users','action'=>'reset_password',$member['User'][0]['id']), null, 
        			'Are you sure you want to reset the password for '.$member['Member']['member_gname'].' '.$member['Member']['member_fname'].'?');
                }
  				?>
                </button>
			
			<button type="submit"><?php
				echo $this->Form->postLink(__('Delete Member'), array('action' => 'delete', $member['Member']['id']), 
					null, __('Are you sure you want to delete: %s?', 
						$member['Member']['member_gname']." ".$member['Member']['member_mname']." ".$member['Member']['member_fname'])); 
			?></a></button>

		</div>
	</div>

	<div id="tabs2";>
		<div class="members form">
			<h2>Enrolled Courses</h2>
			<table id="table_id3" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th>Course Code</th>
						<th>Course Name</th>
						<th>Enrolled</th>
						<th>Difficulty</th>
						<th>Prerequisites</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($member['Course'] as $course): ?>
					<tr>
						<td>
							<?php echo $this->Html->link((h($course['course_code'])), 
								array('controller' => 'Courses', 'action' => 'detailedcourse', $course['id'])); ?>
						</td>
						<td><?php echo $course['course_name']; ?></td>
						<td><?php echo h($course['current_enrolled']); ?>&nbsp;/&nbsp;<?php echo h($course['max_enrol_limit']); ?></td>
						<td><?php echo $course['difficulty']; ?></td>
						<td><?php echo $course['prerequisites']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</body>
</html>


