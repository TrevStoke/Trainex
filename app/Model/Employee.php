<?php
App::uses('AppModel', 'Model');
/**
 * Employee Model
 *
 */
class Employee extends AppModel {
	// 'UniqueCompositeBehavior' for 'isUniqueComposite()' validation.
	public $actsAs = array('UniqueComposite');

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
		'first_name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Missing or empty value',
				'required' => 'create',
				'allowEmpty' => FALSE, // Redundant?
			),
			'length' => array(
				'rule' => array('between', 2, 50),
				'message' => 'Length range: %s to %s',
			),
			'isUniqueComposite' => array(
				'rule' => array('isUniqueComposite',
					array('first_name', 'last_name')),
				'message' =>
					array('A record with those values already exists'),
			),
		),
		'last_name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Missing or empty value',
				'required' => 'create',
				'allowEmpty' => FALSE, // Redundant?
			),
			'length' => array(
				'rule' => array('between', 2, 50),
				'message' => 'Length range: %s to %s',
			),
			'isUniqueComposite' => array(
				'rule' => array('isUniqueComposite',
					array('first_name', 'last_name')),
				'message' =>
					array('A record with those values already exists'),
			),
		),
	);

	public function __construct($id = FALSE, $table = NULL, $ds = NULL)
	{
		parent::__construct($id, $table, $ds);
		$alias = $this->alias;
		$this->order = array(
			"$alias.last_name",
			"$alias.first_name",
		);
		$this->virtualFields = array(
			'name' => "CONCAT($alias.first_name, ' ', $alias.last_name)",
		);
	}

	public function findActive()
	{
		return $this->find('all', array(
			'conditions' => array(
				'active' => 1,
			),
		));
	}

	public function findActiveList()
	{
		return $this->find('list', array(
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

	public function findInactiveList()
	{
		return $this->find('list', array(
			'conditions' => array(
				'active' => 0,
			),
		));
	}
}
