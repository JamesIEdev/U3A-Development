
<div class="members_form">
	<?php 
	echo $this->Form->create('Member', array('enctype' => 'multipart/form-data')); 
	echo $this->Form->input('id'); 
	?>
	

	<h2><?php 
	 	$getuser = $this->Session->read('Auth.User'); 
		if ($member['Member']['id'] == $getuser['member_id']) {
			echo __('Edit Profile');
		}
		else {
			echo __('Edit Details');
		}	
	?></h2>

	

	<table cellpadding='0' cellspacing='1' width='100%'>
		<tr> 
			<td class="heading">First Name: </td> 
			<td class="data"><?php echo $this->Form->input('member_gname', array('label' =>'','size'=>'30'));?></td> 
		</tr> 
		<tr> 
			<td class="heading">Middle Name: </td> 
			<td class="data"><?php echo $this->Form->input('member_mname', array('label' =>'','size'=>'30'));?></td> 
		</tr> 
		<tr> 
			<td class="heading">Family Name: </td> 
			<td class="data"><?php echo $this->Form->input('member_fname', array('label' =>'','size'=>'30'));?></td> 
		</tr>
		<tr>
			<td class="heading" width="20%"></td> 
			<td class="data"><br></td> 
		</tr> 
		<tr> 
			<td class="heading">Address: </td> 
			<td class="data"><?php echo $this->Form->input('member_address', array('label' =>'','size'=>'30'));?></td> 
		</tr> 
		<tr> 
			<td class="heading">Postcode: </td> 
			<td class="data"><?php echo $this->Form->input('member_postcode', array('label' =>'','size'=>'30'));?></td> 
		</tr>
		<tr>
			<td class="heading" width="20%"></td> 
			<td class="data"><br></td> 
		</tr>  
		<tr> 
			<td class="heading">Email: </td> 
			<td class="data"><?php echo $this->Form->input('member_email', array('label' =>'','size'=>'30'));?></td> 
		</tr> 
		<tr> 
			<td class="heading">Phone Number: </td> 
			<td class="data"><?php echo $this->Form->input('member_phone', array('label' =>'','size'=>'30'));?></td> 
		</tr> 
		<tr> 
			<td class="heading">Mobile Number: </td> 
			<td class="data"><?php echo $this->Form->input('member_mobile', array('label' =>'','size'=>'30'));?></td> 
		</tr> 
	</table>




<div id="submitButtons">
	<button type="Submit">Confirm Edit<?php echo $this->Form->end(); ?></button>
		<?php 
		if ($member['Member']['id'] == $getuser['member_id']) { ?>
			<button><?php echo $this->Html->link('Go Back', array('controller' => 'members', 'action' => 'Profile/' . $getuser['Member']['id']));?></button>
		<?php } else { ?>
			<button><?php echo $this->Html->link('Go Back', array('controller' => 'members', 'action' => 'detailedmember/' . $member['Member']['id']));?></button>
		<?php } ?>
		
	</div>
</div>


	