<div class="gifts index">
	<h2><?php echo __('Gifts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('address_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('year'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($gifts as $gift): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($gift['Address']['address'], array('controller' => 'addresses', 'action' => 'view', $gift['Address']['id'])); ?>
		</td>
		<td><?php echo h($gift['Gift']['amount']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['year']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gift['Gift']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gift['Gift']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gift['Gift']['id']), null, __('Are you sure you want to delete # %s?', $gift['Gift']['id'])); ?>
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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Gift'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'search')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
