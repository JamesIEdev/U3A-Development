<!-- app/View/Users/add.ctp -->
<div class="forgotten password">
    <p>Please enter your registered U3A email</p>
<?php echo $this->Form->create('User', array('novalidate' => true));?>
    <fieldset>
        <?php echo $this->Form->input('email');?>
    </fieldset>
<p></p>
<?php echo $this->Form->submit('Submit', array('class' => 'form-submit',  'title' => 'Submit')); ?>
</div>

