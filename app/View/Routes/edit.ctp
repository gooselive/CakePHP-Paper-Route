<?php 
echo $this->Html->css('routes', null, array('inline' => false)); 
echo $this->Html->scriptblock("function onClickItems( event ) { 

  select = document.getElementById('select_items'); 
   
  window.location.href = select.options[select.selectedIndex].value;   
   
}", array('inline' => false));?>
<div class="routes form">
<?php echo $this->Form->create('Route'); ?>
	<fieldset>
		<legend><?php echo __('Edit Route'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Html->tag('strong', 'Route '.$this->request->data['Route']['name']);
		echo $this->Form->input('carrier_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
		
<fieldset><legend><?php echo __('Route List'); ?></legend></fieldset>
<ul>
<?php if (!empty($Items)):
	foreach ($Items as $routeItem): ?>
	<li class="actions">
	<?php
		echo($routeItem['RouteItem']['route_order'].' ');
		echo($routeItem['Address']['street_number'].' '.$routeItem['Address']['unit'].' ');	
		echo($routeItem['Direction']['direction'].' ');
		echo($routeItem['Direction']['street_name'].' ');
		echo $this->Html->link(__('Edit'), array('controller' => 'routes', 'action' => 'editItem', $routeItem['RouteItem']['id']));
		echo $this->Form->postLink(__('Delete'), array('controller' => 'routeItems','action' => 'delete', $routeItem['RouteItem']['id']), null, __('Are you sure you want to delete # %s?', $routeItem['RouteItem']['id']));?>
</li>
	<?php		
	endforeach;
endif;
?>
</ul>
<div class="actions"> 
    <label for="select_items">Pick number of items to add</label> 
    <select name="select_items" id="select_items" > 
        <option value=<?php echo $this->Html->url(array('controller' => 'routes', 'action' => 'addItems', $id, 1)); ?>>Add 1 Route Item</option> 
        <option value=<?php echo $this->Html->url(array('controller' => 'routes', 'action' => 'addItems', $id, 2)); ?>>Add 2 Route Items</option> 
        <option value=<?php echo $this->Html->url(array('controller' => 'routes', 'action' => 'addItems', $id, 3)); ?>>Add 3 Route Items</option> 
        <option value=<?php echo $this->Html->url(array('controller' => 'routes', 'action' => 'addItems', $id, 4)); ?>>Add 4 Route Items</option> 
        <option value=<?php echo $this->Html->url(array('controller' => 'routes', 'action' => 'addItems', $id, 5)); ?>>Add 5 Route Items</option> 
        <option value=<?php echo $this->Html->url(array('controller' => 'routes', 'action' => 'addItems', $id, 6)); ?>>Add 6 Route Items</option> 
        <option value=<?php echo $this->Html->url(array('controller' => 'routes', 'action' => 'addItems', $id, 7)); ?>>Add 7 Route Items</option> 
        <option value=<?php echo $this->Html->url(array('controller' => 'routes', 'action' => 'addItems', $id, 8)); ?>>Add 8 Route Items</option> 
        <option value=<?php echo $this->Html->url(array('controller' => 'routes', 'action' => 'addItems', $id, 9)); ?>>Add 9 Route Items</option> 
        <option value=<?php echo $this->Html->url(array('controller' => 'routes', 'action' => 'addItems', $id, 10)); ?>>Add 10 Route Items</option>  
    </select> 
    <input onclick="onClickItems(event)" type="button" value="Go"/> 
</div> 
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Carriers'), array('controller' => 'carriers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New Carrier'), array('controller' => 'carriers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route Item'), array('controller' => 'routes', 'action' => 'addItem', $id)); ?> </li>
		<li><?php echo $this->Html->link(__('New Direction'), array('controller' => 'directions', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Subscriptions'), array('controller' => 'subscriptions', 'action' => 'search')); ?></li>
		<li><?php echo $this->Html->link(__('New Subscription'), array('controller' => 'subscriptions', 'action' => 'add')); ?></li>
	</ul>
</div>
<!--
<div class="actions" style="position:fixed; bottom:0">
	<ul>
		<li><?php echo $this->Html->link(__('Add 1 Route Item'), array('controller' => 'routes', 'action' => 'addItems', $id, 1)); ?> <li/>
		<li><?php echo $this->Html->link(__('Add 2 Route Items'), array('controller' => 'routes', 'action' => 'addItems', $id, 2)); ?> <li/>
		<li><?php echo $this->Html->link(__('Add 3 Route Items'), array('controller' => 'routes', 'action' => 'addItems', $id, 3)); ?> <li/>
		<li><?php echo $this->Html->link(__('Add 4 Route Items'), array('controller' => 'routes', 'action' => 'addItems', $id, 4)); ?> <li/>
		<li><?php echo $this->Html->link(__('Add 5 Route Items'), array('controller' => 'routes', 'action' => 'addItems', $id, 5)); ?> <li/>
		<li><?php echo $this->Html->link(__('Add 6 Route Items'), array('controller' => 'routes', 'action' => 'addItems', $id, 6)); ?> <li/>
		<li><?php echo $this->Html->link(__('Add 7 Route Items'), array('controller' => 'routes', 'action' => 'addItems', $id, 7)); ?> <li/>
		<li><?php echo $this->Html->link(__('Add 8 Route Items'), array('controller' => 'routes', 'action' => 'addItems', $id, 8)); ?> <li/>
		<li><?php echo $this->Html->link(__('Add 9 Route Items'), array('controller' => 'routes', 'action' => 'addItems', $id, 9)); ?> <li/>
		<li><?php echo $this->Html->link(__('Add 10 Route Items'), array('controller' => 'routes', 'action' => 'addItems', $id, 10)); ?> <li/>
	</ul>
</div>
-->
