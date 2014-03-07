<?php	echo $this->Html->script('jquery', FALSE); // Include jQuery library ?>
<?php	echo $this->Html->script('filter', FALSE); // Include filterByText ?>
<div class="subscriptions form">
<?php echo $this->Form->create('Subscription'); ?>
	<fieldset>
		<legend><?php echo __('Edit Subscription'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('address_id', array('id' => 'AddressId'));
		echo '<label for="addressbox">Type here to filter the address list above</label>';
		echo '<input id="addressbox" type="text" /><br />';
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Subscription.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Subscription.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Subscriptions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
