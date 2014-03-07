<?php	echo $this->Html->script('jquery', FALSE); // Include jQuery library ?>
<?php	echo $this->Html->script('filter', FALSE); // Include filterByText ?>
<div class="routeItems form">
<?php echo $this->Form->create('RouteItem'); ?>
	<fieldset>
		<legend><?php echo __('Add Route Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('route_id', array('default' => $id));
		echo $this->Form->input('direction_id', array('id' => 'DirectionId', 'empty' => 'none'));
		echo '<label for="directionbox">Type here to filter the direction list above</label>';
		echo '<input id="directionbox" type="text" /><br />';
		echo $this->Form->input('address_id', array('id' => 'AddressId', 'empty' => 'none'));
		echo '<label for="addressbox">Type here to filter the address list above</label>';
		echo '<input id="addressbox" type="text" /><br />';
		echo $this->Form->input('right_side', array('checked' => false));		
		echo $this->Form->input('route_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Routes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Carriers'), array('controller' => 'carriers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrier'), array('controller' => 'carriers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Route Items'), array('controller' => 'route_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route Item'), array('controller' => 'route_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
