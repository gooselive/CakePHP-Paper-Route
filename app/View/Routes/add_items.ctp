<?php	echo $this->Html->script('jquery', FALSE); // Include jQuery library ?>
<?php	echo $this->Html->script('filter', FALSE); // Include filterByText ?>
<div class="routeItems form">
<?php echo $this->Form->create('RouteItem'); ?>
	<fieldset>
		<legend><?php echo __('Add Route Items'); ?></legend>
	<?php
		for($i = 0; $i < $count; $i++){
		echo $this->Form->hidden('Route.RouteItem.'.$i.'.route_id', array('default' => $id));
		echo $this->Form->input('Route.RouteItem.'.$i.'.direction_id', array('id' => 'DirectionId'.$i, 'empty' => 'none', 'div' => false));
		echo $this->Form->input('filtertext',array('id'=>'directionbox'.$i, 'type'=>'text', 'label'=>'Type here to filter the direction list above'));
		echo $this->Form->input('Route.RouteItem.'.$i.'.address_id', array('id' => 'AddressId'.$i, 'empty' => 'none', 'div' => false));
		echo $this->Form->input('filtertext',array('id'=>'addressbox'.$i, 'type'=>'text', 'label'=>'Type here to filter the address list above'));
		echo $this->Form->input('Route.RouteItem.'.$i.'.right_side', array('checked' => false, 'div' => false));		
		echo $this->Form->input('Route.RouteItem.'.$i.'.route_order');
		}
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
		<li><?php echo $this->Html->link(__('Add Direction'), array('controller' => 'directions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
