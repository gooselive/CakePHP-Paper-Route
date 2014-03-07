<?php echo $this->element('searchForm/set_pagination_named');//set pagination named element ?>
<div class="subscriptions index">
	
	<h2><?php echo __('Subscriptions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('publication'); ?></th>
			<th><?php echo $this->Paginator->sort('subscription_type'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php	foreach ($subscriptions as $subscription): ?>
	<tr>
		<td><?php echo ucwords(strtolower($this->Html->link($subscription['Address']['address'], array('controller' => 'addresses', 'action' => 'view', $subscription['Address']['id'])))); ?></td>
		<td><?php echo h($subscription['Subscription']['publication']); ?>&nbsp;</td>
		<td><?php echo h($subscription['Subscription']['subscription_type']); ?>&nbsp;</td>
		<td><?php if ($subscription['Subscription']['active']) echo "Yes"; else echo "No"; ?>&nbsp;</td> 
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $subscription['Subscription']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subscription['Subscription']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subscription['Subscription']['id']), null, __('Are you sure you want to delete # %s?', $subscription['Subscription']['id'])); ?>
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
		echo $this->Paginator->first('<< ' . __('first'), array());
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last('>> ' . __('last'), array());
	?>
	</div>

</div>
<div class="actions">
	<?php echo $this->element('searchForm/subscriptionform') //search form element?>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Search Addresses'), array('controller' => 'addresses','action' => 'search')); ?></li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses','action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subscribers'), array('controller' => 'subscribers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subscriber'), array('controller' => 'subscribers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subscription'), array('action' => 'add')); ?> </li>
	</ul>

</div>

