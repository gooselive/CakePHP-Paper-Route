<div class='search' style="margin:10px;">
<fieldset>
<h2> Search <?php echo ucwords($this->params['controller']) ?></h2><hr/>
<?php echo $this->Form->create(array('action' => 'search', 'type' => 'GET', 'novalidate' => true)); ?>
 <?php
 $number = isset($this->params['url']['street_number']) ? $this->params['url']['street_number'] : null;
 $name = isset($this->params['url']['street_name']) ? $this->params['url']['street_name'] : null;
 $unit = isset($this->params['url']['unit']) ? $this->params['url']['unit'] : null;
 $city = isset($this->params['url']['city']) ? $this->params['url']['city'] : null;
 $state = isset($this->params['url']['state']) ? $this->params['url']['state'] : null;
 $zip = isset($this->params['url']['zip']) ? $this->params['url']['zip'] : null;
 echo $this->Form->input('street_number', array('div' => false, 'label'=>'Street Number','value'=>$number));
 echo $this->Form->input('street_name', array('div' => false, 'label'=>'Street Name','value'=>$name));
 echo $this->Form->input('unit', array('div' => false,  'label'=>'Apt/Suite','value'=>$unit));
 echo $this->Form->input('city', array('div' => false,  'label'=>'City','value'=>$city));
 echo $this->Form->input('state', array('div' => false,  'label'=>'State','value'=>$state));
 echo $this->Form->input('zip', array('div' => false,  'label'=>'Zip','value'=>$zip));
 echo $this->Form->submit('Search',array('class'=>'button'));
 ?>
 
<?php echo $this->Form->end(); ?>
</fieldset>
</div>
<br/>
