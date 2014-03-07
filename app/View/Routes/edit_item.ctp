<?php	echo $this->Html->script('jquery', FALSE); // Include jQuery library ?>
<?php	echo $this->Html->script('filter', FALSE); // Include filterByText ?>
<div class="routeItems form">
<?php echo $this->Form->create('RouteItem'); ?>
	<fieldset>
		<legend><?php echo __('Edit Route Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('route_id');
		echo $this->Form->input('direction_id', array('id' => 'DirectionId', 'empty' => 'none'));
		echo $this->Form->input('directionbox', 
			array('id' => 'directionbox', 'label' => 'Type here to filter the direction list above'));
		echo $this->Form->input('address_id', array('id' => 'AddressId', 'empty' => 'none'));
		echo $this->Form->input('addressbox', 
			array('id' => 'addressbox', 'label' => 'Type here to filter the address list above'));
		echo $this->Form->input('right_side');		
		echo $this->Form->input('route_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RouteItem.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RouteItem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Route Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Directions'), array('controller' => 'directions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direction'), array('controller' => 'directions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Direction'), array('controller' => 'directions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
