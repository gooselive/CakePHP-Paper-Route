<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 * @property Gift $Gift
 * @property Subscriber $Subscriber
 * @property Subscription $Subscription
 */
class Address extends AppModel {
	public $virtualFields = array(
    'address' => "CONCAT(Address.street_number, ' ', 
    Address.street_name, ' ', Address.unit)"
);
	public $displayField = 'address';
	public $order = array("street_name" => "ASC", "street_number" => "ASC"); 

	public function beforeValidate($options=array()){
      if (!empty($this->data['Address']['street_name'])) {
		  $this->data['Address']['street_name'] = $this->capitalize($this->data['Address']['street_name']);
	  }
      return true; 
   }
   
   public function capitalize($addrString) {
	   return strtoupper($addrString);
   }
/**
 * Validation rules
 *
 * @var array
 */
	
	public $validate = array(
		'street_number' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a street number',
				'allowEmpty' => true,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			"unique"=>array( 
				"rule"=>array("checkUnique", array("street_number", "street_name", "unit")), 
                "message"=>'An Address with this Street Number, Street Name and Unit already exists. Please try again.' 
                        ), 
			
		),
		'street_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a street name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
       ); 
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Gift' => array(
			'className' => 'Gift',
			'foreignKey' => 'address_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Subscriber' => array(
			'className' => 'Subscriber',
			'foreignKey' => 'address_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Subscription' => array(
			'className' => 'Subscription',
			'foreignKey' => 'address_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
/**
 * belongsTo associations
 *
 * @var array
 */

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'RouteItem' => array(
			'className' => 'RouteItem',
			'foreignKey' => 'address_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
