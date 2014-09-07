<div class="users form">
<?php echo $this->Html->css('logincss'); ?>
<?php 
  echo $this->Form->create('User'); 
?>
    <fieldset>
	<?php 
          echo $this->Form->input('email',array('placeholder'=>' Enter your Email'));
          echo $this->Form->input('password',array('placeholder'=>' Enter your Password'));
	?>
    </fieldset>

<?php echo $this->Form->end(__('Login')); ?>

<?php echo $this->Html->link(__('Forgot your password?'), array('controller' => 'Users', 'action' => 'forgot')); ?>




</div>