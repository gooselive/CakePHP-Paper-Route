<div class="directions form">
<?php echo $this->Form->create('Direction'); ?>
	<fieldset>
		<legend><?php echo __('Add Direction'); ?></legend>
	<?php
		echo $this->Form->input('direction');
		echo $this->Form->input('street_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Directions'), array('action' => 'index')); ?></li>
	</ul>
</div>
