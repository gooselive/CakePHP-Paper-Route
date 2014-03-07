<div class="routes index">
	<h2><?php echo __('Routes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th ><?php echo $this->Paginator->sort('carrier'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($routes as $route): ?>
	<tr>
		<td><?php echo h($route['Route']['name']); ?>&nbsp;</td>
		<td><?php echo h($route['Carrier']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $route['Route']['slug']), 
				array('target' => '_blank')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $route['Route']['slug'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $route['Route']['slug']), null, __('Are you sure you want to delete # %s?', $route['Route']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Route'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Carriers'), array('controller' => 'carriers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrier'), array('controller' => 'carriers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Find Address'), array('controller' => 'addresses', 'action' => 'search')); ?> </li>
		<li><?php echo $this->Html->link(__('Find Subscription'), array('controller' => 'subscriptions', 'action' => 'search')); ?> </li>
		<li><?php echo $this->Html->link(__('Find Subscriber'), array('controller' => 'subscribers', 'action' => 'search')); ?> </li>
	</ul>
</div>
