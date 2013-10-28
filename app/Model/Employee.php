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
			'boolean' => array(
				'rule' => 'boolean',
				'message' => AppModel::validationMessageBoolean,
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
		),
		'first_name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => AppModel::validationMessageNotEmpty,
				'required' => 'create',
				'allowEmpty' => FALSE, // Redundant?
			),
			'between' => array(
				'rule' => array('between', 2, 50),
				'message' => AppModel::validationMessageBetween,
			),
			'format' => array(
				'rule' => array('validateNameFormat'),
				'message' => AppModel::validationMessageFormat,
			),
			'uniqueComposite' => array(
				'rule' => array('isUniqueComposite',
					array('first_name', 'last_name')),
				'message' => 'A record with those values already exists',
				'message' => AppModel::validationMessageUniqueComposite,
			),
		),
		'last_name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => AppModel::validationMessageNotEmpty,
				'required' => 'create',
				'allowEmpty' => FALSE, // Redundant?
			),
			'between' => array(
				'rule' => array('between', 2, 50),
				'message' => AppModel::validationMessageBetween,
			),
			'format' => array(
				'rule' => array('validateNameFormat'),
				'message' => AppModel::validationMessageFormat,
			),
			'uniqueComposite' => array(
				'rule' => array('isUniqueComposite',
					array('first_name', 'last_name')),
				'message' => AppModel::validationMessageUniqueComposite,
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

	public function validateNameFormat($field)
	{
		$fieldValue = reset($field);
		$errorMsg = 'Invalid format';

		// '\pL': Unicode letter.
		if (preg_match('/^\pL[\pL \'-]*\pL$/', $fieldValue) == FALSE)
		{
			return $errorMsg;
		}

		// Spaces, apostrophes and hyphens are allowed, but not consecutively.
		if (strpos($fieldValue, '  ') !== FALSE ||
			strpos($fieldValue, '\'\'') !== FALSE ||
			strpos($fieldValue, '--') !== FALSE)
		{
			return $errorMsg;
		}

		return TRUE;
	}
}
