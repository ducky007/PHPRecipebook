            <h2><?php echo __('Edit User'); ?></h2>
            <div class="actions">
            <ul>
                    <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
                    <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
            </ul>
            </div>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
	<?php
            echo $this->Form->hidden('id');
            echo $this->Form->input('username');
            echo $this->Form->input('password1',array('type'=>'password','label'=>array('text'=>'Password')));
            echo $this->Form->input('password2',array('type'=>'password','label'=>array('text'=>'Confirm password')));
            echo $this->Form->input('name');
            echo $this->Form->input('access_level');
            echo $this->Form->input('language');
            echo $this->Form->input('country');
            echo $this->Form->input('last_login');
            echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>