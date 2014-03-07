<div class='search' style="margin:10px;">
<fieldset>
<h2> Search <?php echo ucwords($this->params['controller']) ?></h2><hr/>
<?php echo $this->Form->create(array('action' => 'search', 'type' => 'GET')); ?>
 <?php
 $street = isset($this->params['url']['street_name']) ? $this->params['url']['street_name'] : null;
 $publication = isset($this->params['url']['publication']) ? $this->params['url']['publication'] : null;
 $type = isset($this->params['url']['subscription_type']) ? $this->params['url']['subscription_type'] : null;
 $active = isset($this->params['url']['active']) ? $this->params['url']['active'] : null;
 echo $this->Form->input('Address.street_name', array('div' => false,'label'=>'Street Name','value'=>$street));
 echo $this->Form->input('publication', array('div' => false,'label'=>'Publication','value'=>$publication));
 echo $this->Form->input('subscription_type', array('div' => false, 'label'=>'Subscription type','value'=>$type));
 echo $this->Form->input('active', array('checked' => true, 'hiddenfield' => false, 'label'=>'Active'));
 
 echo $this->Form->submit('Search',array('class'=>'button', 'formnovalidate' => true));
 ?>
<?php echo $this->Form->end(); ?>
</fieldset>
</div>
