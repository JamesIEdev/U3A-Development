<!-- app/View/Users/add.ctp -->
<div class="users form">

<?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data', 'novalidate' => true));?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php
			echo $this->Form->input('member_id', array(
			    'label' => 'Member',
			    'empty' => '-- Select an Active Member --'
			));
			echo $this->Form->input('email');
		    echo $this->Form->input('password');
			echo $this->Form->input('password_confirm', 
				array('label' => 'Confirm Password', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password')
			);
	        echo $this->Form->input('role', 
	        	array('options' => array('member' => 'Member', 'teachingstaff' => 'Teaching Staff', 
	        							 'officevolunteer' => 'Office Volunteer', 'superuser' => 'Super User')
	        ));
		?>
    </fieldset>
<p></p>
<?php
	echo $this->Form->submit('Add', array('class' => 'form-submit',  'title' => 'Click here to add the user')); 
?>
<?php echo $this->Form->end(); ?>
</div>

<div class="actions">
	<ul>
		<li>
			<?php 
                if($this->Session->check('Auth.User')) {
            ?>
            	<h2><?php echo __('Actions'); ?></h2>
            <?php
		            echo $this->Html->link("List Users", array('action'=>'index')); 
		            echo "<br>";
                }
            ?>
		</li>
	</ul>
</div>