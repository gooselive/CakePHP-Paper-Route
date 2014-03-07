<div class='search' style="margin:10px;">
<fieldset>
<h2> Search <?php echo ucwords($this->params['controller']) ?></h2><hr/>
<?php echo $this->Form->create(array('action' => 'search', 'type' => 'GET', 'novalidate' => true)); ?>
 <?php
 $street = isset($this->params['url']['street_name']) ? $this->params['url']['street_name'] : null;
 $name = isset($this->params['url']['name']) ? $this->params['url']['name'] : null;
 $spouse = isset($this->params['url']['spouse_name']) ? $this->params['url']['spouse_name'] : null;
 $home = isset($this->params['url']['phone']) ? $this->params['url']['phone'] : null;
 $cell = isset($this->params['url']['cell_phone']) ? $this->params['url']['cell_phone'] : null;
 $work = isset($this->params['url']['work_phone']) ? $this->params['url']['work_phone'] : null;
 $email = isset($this->params['url']['email']) ? $this->params['url']['email'] : null;
 $employer = isset($this->params['url']['employer']) ? $this->params['url']['employer'] : null;
 echo $this->Form->input('street_name', array('div' => false, 'label'=>'Street Name','value'=>$street));
 echo $this->Form->input('name', array('div' => false, 'label'=>'Name','value'=>$name));
 echo $this->Form->input('spouse_name', array('div' => false,  'label'=>'Spouse Name','value'=>$spouse));
 echo $this->Form->input('phone', array('div' => false,  'label'=>'Phone','value'=>$home));
 echo $this->Form->input('work_phone', array('div' => false,  'label'=>'Work Phone','value'=>$work));
 echo $this->Form->input('cell_phone', array('div' => false,  'label'=>'Cell Phone','value'=>$cell));
 echo $this->Form->input('email', array('div' => false,  'label'=>'Email','value'=>$email));
 echo $this->Form->input('employer', array('div' => false,  'label'=>'Employer','value'=>$employer));
 echo $this->Form->submit('Search',array('class'=>'button'));
 ?>
 
<?php echo $this->Form->end(); ?>
</fieldset>
</div>
<br/>
