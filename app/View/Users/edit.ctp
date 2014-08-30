<!-- app/View/Users/edit.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php 
			echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
			echo "Usernames cannot be changed";
			echo $this->Form->input('username', array('label' => 'Username: ', 'readonly' => 'readonly'));
		?>

		<p></p>
		
		<?php
			echo $this->Form->input('email', array('label' => 'Email: '));
		?>

		<p></p>

		<?php
			echo "Leave empty if you do not want to change password";
	        echo $this->Form->input('password_update', 
	        	array('label' => 'New Password: ', 'maxLength' => 255, 'type'=>'password','required' => 0));
			echo $this->Form->input('password_confirm_update', 
				array('label' => 'Confirm New Password: ', 'label' => 'Confirm New password', 'maxLength' => 255, 'type'=>'password','required' => 0)
			);
		?>

		<p></p>

		<?php
			echo $this->Form->input('role', 
				array('label' => 'Role: ', 'options' => array('officevolunteer' => 'Office Volunteer', 'member' => 'Member', 'teachingstaff' => 'Teaching Staff'))
			);
		?>
    </fieldset>
<p></p>
<?php
	echo $this->Form->submit('Confirm Edit', array('class' => 'form-submit',  'title' => 'Click here to add the user')); 
?>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Back'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>