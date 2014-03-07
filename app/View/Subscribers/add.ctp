<?php	echo $this->Html->script('jquery', FALSE); // Include jQuery library ?>
<?php	echo $this->Html->script('filter', FALSE); // Include filterByText ?>
<div class="subscribers form">
<?php echo $this->Form->create('Subscriber'); ?>
	<fieldset>
		<legend><?php echo __('Add Subscriber'); ?></legend>
	<?php
		echo $this->Form->input('address_id', array('id' => 'AddressId'));
		echo $this->Form->input('name');
		echo $this->Form->input('spouse_name');
		echo $this->Form->input('phone');
		echo $this->Form->input('cell_phone');
		echo $this->Form->input('work_phone');
		echo $this->Form->input('email');
		echo $this->Form->input('employer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Subscribers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
	<br/>
	<?php
		echo '<label for="addressbox">Type here to filter the address selection list</label>';
		echo '<input id="addressbox" type="text" /><br />';
	?>
</div>
