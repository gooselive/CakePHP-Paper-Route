<div class="routeItems form">
<?php echo $this->Form->create('RouteItem'); ?>
	<fieldset>
		<legend><?php echo __('Add Route Item'); ?></legend>
	<?php
		echo $this->Form->input('route_id');
		echo $this->Form->input('direction_id', array('empty' => 'none'));
		echo $this->Form->input('address_id', array('empty' => 'none'));
		echo $this->Form->input('right_side', array('checked' => false));
		echo $this->Form->input('route_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Route Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Directions'), array('controller' => 'directions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direction'), array('controller' => 'directions', 'action' => 'add')); ?> </li>
	</ul>
</div>
