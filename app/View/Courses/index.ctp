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
				<li><a href="#tabs2">Add Course</a></li>
			</ul>

			<div id="tabs1">
				<div class="courses index">
					<h2><?php echo __('Courses'); ?></h2>
					<table  id="table_id1" cellpadding="0" cellspacing="0">
						<thead>
						<tr>
								<th>Course Code</th>
								<th>Course Name</th>
								<th>Enrolled</th>
								<th>Difficutly</th>
								<th>Prerequisites</th>
						</tr>
					</thead>
						<?php foreach ($courses as $course): ?>
						<tbody>
						<tr>
							<td><?php echo $this->Html->link((h($course['Course']['course_code'])), array('action' => 'detailedcourse', $course['Course']['id'])); ?>&nbsp;</td>
							<td><?php echo h($course['Course']['course_name']); ?>&nbsp;</td>
							<td><?php echo h($course['Course']['current_enrolled']); ?>&nbsp;/&nbsp;<?php echo h($course['Course']['max_enrol_limit']); ?>&nbsp;</td>
							<td><?php echo h($course['Course']['difficulty']); ?>&nbsp;</td>
							<td><?php echo h($course['Course']['prerequisites']); ?>&nbsp;</td>
						</tr>
					</tbody>
					<?php endforeach; ?>
				</table>
				</div>
			</div>

			<div id="tabs2">
				<div class="courses form">
					<?php 
						echo $this->Form->create('Course', array('action' => 'add', 'enctype' => 'multipart/form-data', 'novalidate' => true)); 
					?>

					<h2><?php echo __('Add Course'); ?></h2>

					<table cellpadding='0' cellspacing='1' width='100%'>
						<tr> 
							<td class="heading">Course Code: </td> 
							<td class="data"><?php echo $this->Form->input('course_code', array('label' =>'','size'=>'30'));?></td> 
						</tr> 
						<tr> 
							<td class="heading">Course Name: </td> 
							<td class="data"><?php echo $this->Form->input('course_name', array('label' =>'','size'=>'100'));?></td> 
						</tr> 
						<tr> 
							<td class="heading">Description: </td> 
							<td class="data"><?php echo $this->Form->input('description', array('label' =>'','size'=>'100'));?></td> 
						</tr>
						<tr> 
							<td class="heading">Max Enrol Limit: </td> 
							<td class="data"><?php echo $this->Form->input('max_enrol_limit', array('label' =>'','size'=>'30'));?></td> 
						</tr>
						<tr>
							<td class="heading" width="20%"></td> 
							<td class="data"><br></td> 
						</tr> 
						<tr> 
							<td class="heading">Difficulty: </td> 
							<td class="data"><?php echo $this->Form->input('difficulty', array('label' =>'','size'=>'30'));?></td> 
						</tr> 
						<tr> 
							<td class="heading">Pre-requisites: </td> 
							<td class="data"><?php echo $this->Form->input('prerequisites', array('label' =>'','size'=>'30'));?></td> 
						</tr> 
					</table>
					<div id="submitButtons">
						<button type="submit">Confirm Add<?php echo $this->Form->end(); ?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
