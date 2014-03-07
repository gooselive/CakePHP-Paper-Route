<?php
class SearchComponent extends Component {
   
    public $controller = null;
 
    function initialize(Controller $controller)
    {
        $this->controller = $controller;
    }
    function getConditions(){
	$conditions = array();
	//debug(array_keys($this->controller->{$this->controller->modelClass}->getAssociated(), 'belongsTo'));
	$data= empty($this->controller->params['named']) ? $this->controller->params['url'] : $this->controller->params['named'] ;
	//keys for this model
	$this->controller->{$this->controller->modelClass}->schema();	
	//keys for parent models
	if(count(array_keys($this->controller->{$this->controller->modelClass}->getAssociated(), 'belongsTo')) > 0) {
		foreach (array_keys($this->controller->{$this->controller->modelClass}->getAssociated(), 'belongsTo') as $model){
			$this->controller->{$model}->schema(); 
		  foreach($data as $key=>$value){
			 if(isset($this->controller->{$model}->_schema[$key])){
					switch($this->controller->{$model}->_schema[$key]['type']){
						case "boolean":
							!empty($value) ? $conditions[$model . "." .$key]=true:$conditions[$model . "." .$key]=false;
						}
				}
			}
			      foreach($data as $key=>$value){
						if(isset($this->controller->{$model}->_schema[$key]) && !empty($value)){
							switch($this->controller->{$model}->_schema[$key]['type']){
								case "string":
									$conditions[$model . "." .$key . " REGEXP"] = trim($value);						
									break;
								case "integer":
									$conditions[$model . "." .$key. " REGEXP"] =  $value;
									break;
								case "date":
									if(isset($this->controller->params['named'][$key."_fromdate"])){
										$from = date("Y-m-d", strtotime( $this->controller->params['named'][$key."_fromdate"] ));
										$conditions[$model.".".$key." >="] = trim($from);
									}
									if(isset($this->controller->params['named'][$key."_todate"])){
										$to = date("Y-m-d", strtotime($this->params['named'][$key."_todate"]));
										$conditions[$model.".".$key." <="] = $to;
									}
							}
						}
					}
				}
			}
      //	debug($data);	
      foreach($data as $key=>$value){
		 if(isset($this->controller->{$this->controller->modelClass}->_schema[$key])){
				switch($this->controller->{$this->controller->modelClass}->_schema[$key]['type']){
					case "boolean":
						!empty($value) ? $conditions[$this->controller->modelClass . "." .$key]=true:$conditions[$this->controller->modelClass . "." .$key]=false;
					}
			}
		}

      foreach($data as $key=>$value){		
			if(isset($this->controller->{$this->controller->modelClass}->_schema[$key]) && !empty($value)){
                switch($this->controller->{$this->controller->modelClass}->_schema[$key]['type']){
                    case "string":
                        $conditions[$this->controller->modelClass . "." .$key . " REGEXP"] = trim($value);						
                        break;
                    case "integer":
                        $conditions[$this->controller->modelClass . "." .$key. " REGEXP"] =  $value;
                        break;
                    case "date":
                        if(isset($this->controller->params['named'][$key."_fromdate"])){
                            $from = date("Y-m-d", strtotime( $this->controller->params['named'][$key."_fromdate"] ));
                            $conditions[$this->controller->modelClass.".".$key." >="] = trim($from);
                        }
                        if(isset($this->controller->params['named'][$key."_todate"])){
                            $to = date("Y-m-d", strtotime($this->params['named'][$key."_todate"]));
                            $conditions[$this->controller->modelClass.".".$key." <="] = $to;
                        }
                }
            }

        }
       
	//debug($conditions);
	return $conditions;
}
    }
?>
