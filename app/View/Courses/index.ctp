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
				<li><a href="#tabs2"><?php echo $this->Html->link('Add Course', array('action' => 'add')); ?></a></li>
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
							<td><?php echo h($course['Course']['max_enrol_limit']); ?></td>
							<td><?php echo h($course['Course']['difficulty']); ?>&nbsp;</td>
							<td><?php echo h($course['Course']['prerequisites']); ?>&nbsp;</td>
						</tr>
					</tbody>
					<?php endforeach; ?>
				</table>
				</div>
			</div>
		</div>
	</div>
</body>



