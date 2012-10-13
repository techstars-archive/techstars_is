<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php echo $legend; ?></legend>
		<?php
		if(isset($edit)) {
		echo $this->Form->input('id');
		}
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
	</ul>
</div>