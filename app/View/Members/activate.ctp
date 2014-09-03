
<div class="members view">
	<?php echo $this->Form->create('Member', array('inputDefaults' => array('label' => false))); ?>

<h2><?php echo __('Activate Member'); ?></h2>

<table width="80%"> 
<tr> 
<td class="heading" width="20%">Name:</td> 
<td class="data"><?php echo $this->Form->input('member_gname', array('disabled' => 'disabled')); ?></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Middle Name:</td> 
<td class="data"><?php echo $this->Form->input('member_mname', array('disabled' => 'disabled')); ?></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Last Name:</td> 
<td class="data"><?php echo $this->Form->input('member_fname', array('disabled' => 'disabled')); ?></td> 
</tr>
<tr>
	<td class="heading" width="20%"></td> 
	<td class="data"><br></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Address:</td> 
<td class="data"><?php echo $this->Form->input('member_address', array('disabled' => 'disabled')); ?></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Postcode:</td> 
<td class="data"><?php echo $this->Form->input('member_postcode', array('disabled' => 'disabled')); ?></td> 
</tr> 
<tr>
	<td class="heading" width="20%"></td> 
	<td class="data"><br></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Email:</td> 
<td class="data"><?php echo $this->Form->input('member_email', array('disabled' => 'disabled')); ?></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Phone:</td> 
<td class="data"><?php echo $this->Form->input('member_phone', array('disabled' => 'disabled')); ?></td> 
</tr>
<tr> 
<td class="heading" width="20%">Mobile:</td> 
<td class="data"><?php echo $this->Form->input('member_mobile', array('disabled' => 'disabled')); ?></td> 
</tr>
</table>

	<?php
		// this gets saved
		echo $this->Form->hidden('id');
		echo $this->Form->hidden('member_gname');
		echo $this->Form->hidden('member_mname');
		echo $this->Form->hidden('member_fname');
		echo $this->Form->hidden('member_address');
		echo $this->Form->hidden('member_postcode');
		echo $this->Form->hidden('member_email');
		echo $this->Form->hidden('member_phone');
		echo $this->Form->hidden('member_mobile');
		echo $this->Form->hidden('active', array('value' => '1'));
	?>

	<div id="submitButtons">
		<button type="submit">Confirm Activation<?php echo $this->Form->end(); ?></button>
		<button><?php echo $this->Html->link(__('Go Back'), array('action' => 'detailedmember/'. $member['Member']['id'])); ?></button>
	</div>
</div>

