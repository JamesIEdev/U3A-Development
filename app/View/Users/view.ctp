<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('ID: '); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Member: '); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Member']['memberName'], array('controller' => 'members', 'action' => 'view', $user['Member']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username: '); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email: '); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password: '); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role: '); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Created: '); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Modified: '); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<?php
		  if($is_superuser)
		  {
		?>
		
		    <li>
		      <?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', 
		      $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> 
		    </li>

		<?php
		  }
		?>
	</ul>
</div>
