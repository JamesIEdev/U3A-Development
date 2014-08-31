<p>Your password has been reset.</p>

<p>This is your new password: <?php echo $newPassword;?></p>
<?php echo $this->Html->link('Please click here to log in', array('controller'=>'users','action'=>'login'));?>
