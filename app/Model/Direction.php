<?php
App::uses('AppModel', 'Model');
/**
 * Direction Model
 *
 * @property RouteItem $RouteItem
 */
class Direction extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'direction';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'route_item_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'direction' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'street_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
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
			'foreignKey' => 'direction_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
