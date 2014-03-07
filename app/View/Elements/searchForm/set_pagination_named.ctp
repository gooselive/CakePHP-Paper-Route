<?php
$data_arr=array();
if(isset($this->params['url']) || isset($this->params['named'])){
$data=isset($this->params['named'] ) && !empty($this->params['named']) ? $this->params['named']:$this->params['url'];
// uses php ternary operator - $1 ? $2 : $3 is the same is if $1 then $2 else $3
 $possibledata=array('street_number', 'street_name', 'unit', 'publication', 'subscription_type', 
 'active', 'name', 'spouse_name', 'phone', 'cell_phone', 'work_phone', 'email', 'employer');//possible fields
 //debug($this->params['url']);
 //all boolean types here
 foreach($data as $key=>$value){
 if(in_array($key,$possibledata) && $key === 'active'/* || 'boolkey1' || 'boolkey2 .... */){
 $data_arr[$key]=$data[$key];
 }
 }
 foreach($data as $key=>$value){
 if(in_array($key,$possibledata) && !empty($value)){
 $data_arr[$key]=$data[$key];
 }
 }
 //debug($data_arr);
}
?>
<?php
$this->Paginator->options(array(
 'evalScripts' => true,
 'url'=>$data_arr
));
?>
