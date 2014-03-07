<?php	echo $this->Html->script('jquery', array('inline' => false)); // Include jQuery library ?>
<?php	echo $this->Html->script('filter', array('inline' => false)); // Include filterByText ?>
<div class="subscriptions form">
<?php echo $this->Form->create('Subscription'); ?>
	<fieldset>
		<legend><?php echo __('Add Subscription'); ?></legend>
	<?php
		echo $this->Form->input('address_id', array('id' => 'AddressId'));
		echo $this->Form->input('publication');
		echo $this->Form->input('subscription_type');
		echo $this->Form->input('active', array('checked' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Subscriptions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
	<br/>
	<?php
		echo '<label for="addressbox">Type here to filter the address selection list</label>';
		echo '<input id="addressbox" type="text" /><br />';
	?>
</div>
