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
			'isUniqueComposite' => array(
				'rule' => array('isUniqueComposite',
					array('first_name', 'last_name')),
				'message' => array('Record with those values already exists'),
			),
		),
		'last_name' => array(
			'length' => array(
				'rule' => array('between', 2, 50),
				'message' => 'Length range: %s to %s',
				'required' => 'create',
				'allowEmpty' => FALSE,
			),
			'isUniqueComposite' => array(
				'rule' => array('isUniqueComposite',
					array('first_name', 'last_name')),
				'message' => array('Record with those values already exists'),
			),
		),
	);

	public function __construct($id = FALSE, $table = NULL, $ds = NULL)
	{
		parent::__construct($id, $table, $ds);
		$alias = $this->alias;
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

	public function findCurrent()
	{
		if (isset($this->id) == FALSE)
		{
			throw new NotFoundException('No employee specified');
		}

		$employee = $this->find('first', array(
			'conditions' => array(
				'id' => $this->id,
			),
		));

		if (count($employee) == 0)
		{
			throw new NotFoundException('No employee specified');
		}

		return $employee;
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
