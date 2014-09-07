<div class="reset">

<html>
    <p>
        Please enter new password
    </p>
</html>

<?php

echo $this->Form->create('User');

echo $this->Form->input('id',array('type'=>'hidden','default'=>$userID));
echo $this->Form->input('password', array('label' => 'Password','type'=>'password'));
echo $this->Form->input('password_confirm', array('label' => 'Confirm Password','type'=>'password'));

echo $this->Form->end('Update Password');
?>

</div>
