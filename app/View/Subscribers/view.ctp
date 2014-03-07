<div class="subscribers view">
<h2><?php  echo __('Subscriber'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subscriber['Address']['address'], array('controller' => 'addresses', 'action' => 'view', $subscriber['Address']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Spouse Name'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['spouse_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell Phone'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['cell_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Phone'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['work_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employer'); ?></dt>
		<dd>
			<?php echo h($subscriber['Subscriber']['employer']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subscriber'), array('action' => 'edit', $subscriber['Subscriber']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Subscriber'), array('action' => 'delete', $subscriber['Subscriber']['id']), null, __('Are you sure you want to delete # %s?', $subscriber['Subscriber']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Subscribers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subscriber'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
