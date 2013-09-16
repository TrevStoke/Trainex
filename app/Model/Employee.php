<?php
App::uses('AppModel', 'Model');
/**
 * Employee Model
 *
 */
class Employee extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $validate = array(
		'active' => array(
			'isBoolean' => array(
				'rule' => 'boolean',
				'message' => 'Should be 0 or 1 (or equivalent)',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
		),
		'name' => array(
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'Should be unique',
				'required' => 'create',
				'allowEmpty' => FALSE,
			),
			'length' => array(
				'rule' => array('between', 4, 50),
				'message' => 'Valid length range: %s to %s',
			),
		),
	);

	public function findActive()
	{
		return $this->find('all', array(
			'conditions' => array(
				'active' => 1,
			),
		));
	}

	public function findInactive()
	{
		return $this->find('all', array(
			'conditions' => array(
				'active' => 0,
			),
		));
	}
}
