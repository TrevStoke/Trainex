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
//	public $displayField = 'name';

	public $validate = array(
		'active' => array(
			'isBoolean' => array(
				'rule' => 'boolean',
				'message' => 'Should be 0 or 1 (or equivalent)',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
		),
		'first_name' => array(
			'length' => array(
				'rule' => array('between', 2, 50),
				'message' => 'Length range: %s to %s',
				'required' => 'create',
				'allowEmpty' => FALSE,
			),
		),
		'last_name' => array(
			'length' => array(
				'rule' => array('between', 2, 50),
				'message' => 'Length range: %s to %s',
				'required' => 'create',
				'allowEmpty' => FALSE,
			),
		),
		/*
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
		*/
	);

	/*
	public function __construct($id = FALSE, $table = NULL, $ds = NULL)
	{
		parent::__construct($id, $table, $ds);
		$alias = $this->alias;
		$this->virtualFields = array(
			'name' => "CONCAT($alias.first_name, ' ', $alias.last_name)",
		);
	}
	*/

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
