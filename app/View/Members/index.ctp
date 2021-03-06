<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script> $(function() {
		$("#tabs").tabs();
	});	
	</script>
</head>


<body>
	<p></p>
	<div id="tabcont" type="container">
		<div id="tabs" align="left">
			<ul>
				<li><a href="#tabs1">All Members</a></li>
				<li><a href="#tabs2">Active Members</a></li>
				<li><a href="#tabs3">Inactive Members</a></li>
				<li><a href="#tabs4"><?php echo $this->Html->link('Add Member', array('action' => 'add')); ?></a></li>
			</ul>

			<div id="tabs1">
				<h2><?php echo __('All Members'); ?></h2>  
				<div class="members index">
					<table id="table_id" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Address</th>
								<th>Email</th>
								<th>Phone No.</th>
								<th>Mobile No.</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($members as $member):  {?>
							<tr>
								<td><?php echo $this->Html->link((h($member['Member']['member_gname'])), array('action' => 'detailedmember', $member['Member']['id'])); ?>&nbsp;</td>
								<td><?php echo h($member['Member']['member_fname']); ?>&nbsp;</td>
								<td><?php echo h($member['Member']['member_address']); ?>&nbsp;</td>
								<td><?php echo h($member['Member']['member_email']); ?>&nbsp;</td>
								<td><?php echo h($member['Member']['member_phone']); ?>&nbsp;</td>
								<td><?php echo h($member['Member']['member_mobile']); ?>&nbsp;</td>
							</tr>
							<?php } endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

			<div id="tabs2">
				<div class="members index">

					<h2><?php echo __('Active Members'); ?></h2>

					<table id="table_id1" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Address</th>
								<th>Email</th>
								<th>Phone No.</th>
								<th>Mobile No.</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($members as $member): 
							if ($member['Member']['active'] > 0) {
								?>
								<tr>
									<td><?php echo $this->Html->link((h($member['Member']['member_gname'])), array('action' => 'detailedmember', $member['Member']['id'])); ?>&nbsp;</td>
									<td><?php echo h($member['Member']['member_fname']); ?>&nbsp;</td>
									<td><?php echo h($member['Member']['member_address']); ?>&nbsp;</td>
									<td><?php echo h($member['Member']['member_email']); ?>&nbsp;</td>
									<td><?php echo h($member['Member']['member_phone']); ?>&nbsp;</td>
									<td><?php echo h($member['Member']['member_mobile']); ?>&nbsp;</td>
								</tr>
								<?php 
							}
							endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

			<div id="tabs3">
				<div class="members index">
					<h2><?php echo __('Inactive Members'); ?></h2>
					<table id="table_id2" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Address</th>
								<th>Email</th>
								<th>Phone No.</th>
								<th>Mobile No.</th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($members as $member):
								if ($member['Member']['active'] < 1) {
							?>
									<tr>
										<td><?php echo $this->Html->link((h($member['Member']['member_gname'])), array('action' => 'detailedmember', $member['Member']['id'])); ?>&nbsp;</td>
										<td><?php echo h($member['Member']['member_fname']); ?>&nbsp;</td>
										<td><?php echo h($member['Member']['member_address']); ?>&nbsp;</td>
										<td><?php echo h($member['Member']['member_email']); ?>&nbsp;</td>
										<td><?php echo h($member['Member']['member_phone']); ?>&nbsp;</td>
										<td><?php echo h($member['Member']['member_mobile']); ?>&nbsp;</td>
										<td class="activate">
											<?php echo $this->Html->link(__('Activate Member'), array('action' => 'activate', $member['Member']['id']), array('class' => 'myButton')); ?>
										</td>
									</tr>
									<?php 
								}
								endforeach; 
								?>
							</tbody>
						</table>	
					</div>
				</div>
			</div>
		</div>