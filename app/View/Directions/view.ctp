<div class="directions view">
<h2><?php  echo __('Direction'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($direction['Direction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direction'); ?></dt>
		<dd>
			<?php echo h($direction['Direction']['direction']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street Name'); ?></dt>
		<dd>
			<?php echo h($direction['Direction']['street_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($direction['Direction']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($direction['Direction']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Direction'), array('action' => 'edit', $direction['Direction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Direction'), array('action' => 'delete', $direction['Direction']['id']), null, __('Are you sure you want to delete # %s?', $direction['Direction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Directions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Direction'), array('action' => 'add')); ?> </li>
	</ul>
</div>
