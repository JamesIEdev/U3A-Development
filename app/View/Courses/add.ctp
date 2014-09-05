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
			<td class="data"><?php echo $this->Form->input('course_name', array('label' =>'','size'=>'30'));?></td> 
		</tr> 
		<tr> 
			<td class="heading">Description: </td> 
			<td class="data"><?php echo $this->Form->input('description', array('label' =>'','size'=>'30'));?></td> 
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