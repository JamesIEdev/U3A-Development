<!doctype html>
<html lang="en">
<head>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
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
				<li><a href="#tabs3"><?php echo $this->Html->link(__('Go Back'), array('action' => 'index')); ?></a></li>
				
			</ul>

			<div id="tabs1";>
				<div class="members index">
					<h2>
						<?php echo __('Profile'); ?>
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

				<h2>Account Details</h2>
				<?php if (!empty($member['User'])): ?>
				
				<table cellpadding = "0" cellspacing = "0">
					<?php foreach ($member['User'] as $user): ?>
					<tr>
						<td class="heading" width="20%">ID:</td> 
						<td class="data"><?php echo $user['id']; ?></td> 
					</tr>
					<tr>
						<td class="heading" width="20%">Email:</td> 
						<td class="data"><?php echo $user['email']; ?></td> 
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>				
		</table>


		<div id="submitButtons">
			<button type="submit"><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit_profile', $member['Member']['id'])); ?></a></button>
		</div>
	</div>


	<div id="tabs2";>
		<div class="members form">
			<h2>Enrolled Courses</h2>
			<table id="table_id3" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th><?php echo __('Course Code'); ?></th>
						<th><?php echo __('Course Name'); ?></th>
						<th><?php echo __('Description'); ?></th>
						<th><?php echo __('Max Enrol Limit'); ?></th>
						<th><?php echo __('Difficulty'); ?></th>
						<th><?php echo __('Prerequisites'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($member['Course'] as $course): ?>
					<tr>
						<td><?php echo $course['course_code']; ?></td>
						<td><?php echo $course['course_name']; ?></td>
						<td><?php echo $course['description']; ?></td>
						<td><?php echo $course['max_enrol_limit']; ?></td>
						<td><?php echo $course['difficulty']; ?></td>
						<td><?php echo $course['prerequisites']; ?></td>
					</tr>

				</tbody>
			<?php endforeach; ?>
		</table>
</div>
</div>

</div>
</div>

</body>
</html>
