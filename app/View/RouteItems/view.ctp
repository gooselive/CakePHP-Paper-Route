<div class="routeItems view">
<h2><?php  echo __('Route Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($routeItem['RouteItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($routeItem['RouteItem']['route_id'], array('controller' => 'routes', 'action' => 'view', $routeItem['Route']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direction'); ?></dt>
		<dd>
			<?php echo $this->Html->link($routeItem['Direction']['direction'], array('controller' => 'directions', 'action' => 'view', $routeItem['Direction']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo $this->Html->link($routeItem['Address']['address'], array('controller' => 'addresses', 'action' => 'view', $routeItem['Address']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route Order'); ?></dt>
		<dd>
			<?php echo h($routeItem['RouteItem']['route_order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($routeItem['RouteItem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($routeItem['RouteItem']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Route Item'), array('action' => 'edit', $routeItem['RouteItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Route Item'), array('action' => 'delete', $routeItem['RouteItem']['id']), null, __('Are you sure you want to delete # %s?', $routeItem['RouteItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Route Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Directions'), array('controller' => 'directions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direction'), array('controller' => 'directions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
</div>
