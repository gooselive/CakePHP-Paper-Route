<?php
App::uses('AppModel', 'Model');
/**
 * Route Model
 *
 * @property Carrier $Carrier
 * @property RouteItem $RouteItem
 */
class Route extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public function beforeSave($options = array()) {
	   parent::beforeSave($options);
	   $this->data['Route']['slug'] = Inflector::slug($this->data['Route']['name']);
	   return true;
	}
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'carrier_id' => array(
			'numeric' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
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
			'RouteItem' => array(
			'className' => 'RouteItem',
			'foreignKey' => 'route_id',
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
	public $belongsTo = array(
			'Carrier' => array(
			'className' => 'Carrier',
			'foreignKey' => 'carrier_id',
			'dependent' => false
		)
	);
}
