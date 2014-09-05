<div class="members_form">
	<?php 
		echo $this->Form->create('Member', array('enctype' => 'multipart/form-data', 'novalidate' => true)); 
	?>

	<h2><?php echo __('Add User'); ?></h2>

	<table cellpadding='0' cellspacing='1' width='100%'>

		<?php
		    $id = $this->params['url']['id'];
		    
		    foreach ($members as $member):
			if ($member['Member']['id'] == $id) {
				$email = $member['Member']['member_email'];
				$password = $member['Member']['member_gname'] . $member['Member']['member_fname'];
			}
			endforeach;
		?>

		<tr> 
			<td class="heading">Member ID: </td> 
			<td class="data"><?php echo $this->Form->input('User.member_id', 
				array('label' =>'', 'type' => 'text', 'value' => $id, 'disabled' => 'disabled')); ?>
			</td>
		</tr>
		<tr>
			<td class="heading">Email: </td> 
			<td class="data"><?php echo $this->Form->input('User.email', 
				array('label' =>'', 'value' => $email, 'disabled' => 'disabled','size'=>'30'));?>
			</td> 
		</tr>
		<tr>
			<td class="heading">Password: </td> 
			<td class="data"><?php echo $this->Form->input('User.password', 
				array('label' =>'', 'type' => 'password', 'value' => $password, 'disabled' => 'disabled'));?>
			</td> 
		</tr>
		<tr>
			<td class="heading">Confirm Password: </td> 
			<td class="data"><?php echo $this->Form->input('User.password_confirm', 
				array('label' =>'', 'type' => 'password', 'value' => $password, 'disabled' => 'disabled'));?>
			</td> 
		</tr>
		</tr>
			<td class="heading">Role: </td> 
			<td class="data"><?php echo $this->Form->input('User.role', 
			   	array('label' =>'', 
			   		  'options' => array('member' => 'Member', 'teachingstaff' => 'Teaching Staff', 'officevolunteer' => 'Office Volunteer'), 'value' => 'member'));?>
			</td> 
		</tr>
	</table>

	<?php
		// this gets saved
		echo $this->Form->hidden('User.member_id', array('value' => $id));
		echo $this->Form->hidden('User.email', array('value' => $email));
		echo $this->Form->hidden('User.password', array('value' => $password));
		echo $this->Form->hidden('User.password_confirm', array('value' => $password));
	?>

	<div id="submitButtons">
		<button type="submit">Add User<?php echo $this->Form->end(); ?></button>
		<button><?php echo $this->Html->link('Skip', array('controller' => 'members', 'action' => 'index')); ?></button>
	</div>
</div>
