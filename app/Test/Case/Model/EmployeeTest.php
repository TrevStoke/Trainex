<?php
App::uses('Employee', 'Model');

/**
 * Employee Test Case
 *
 * @property Employee $Employee
 * @property EmployeeFixture $EmployeeFixture
 */
class EmployeeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.employee'
	);

	public $employeeFixtureRecords;

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Employee = ClassRegistry::init('Employee');
		$this->EmployeeFixture = ClassRegistry::init('EmployeeFixture');
		$this->employeeFixtureRecords = $this->EmployeeFixture->records;
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Employee);
		unset($this->EmployeeFixture);
		unset($this->employeeFixtureRecords);
		parent::tearDown();
	}

	// Bad 'active'. ----------------------------------------------------------

	public function testBadActiveBoolean()
	{
		$badActives = array(-1, 2, '2');

		foreach ($badActives as $badActive)
		{
			$assertMessage =
				"Value of 'active': " . var_export($badActive, TRUE);
			$this->Employee->create();
			$this->Employee->set(array('active' => $badActive));
			$this->Employee->validates(array('fieldList' => array('active')));
			$this->assertEqual(
				isset($this->Employee->validationErrors['active'][0]), TRUE,
				$assertMessage);
			$this->assertEqual($this->Employee->validationErrors['active'][0],
				AppModel::validationMessageBoolean, $assertMessage);
		}
	}

	// Bad 'first_name'. ------------------------------------------------------

	public function testBadFirstNameBetween()
	{
		$badFirstNames = array(
			'i',
			'iiiiiiiiiXiiiiiiiiiXiiiiiiiiiXiiiiiiiiiXiiiiiiiiiXi', // 51 chars
		);
		$validationMessage = sprintf(AppModel::validationMessageBetween,
			$this->Employee->validate['first_name']['between']['rule'][1],
			$this->Employee->validate['first_name']['between']['rule'][2]);

		foreach ($badFirstNames as $badFirstName)
		{
			$assertMessage =
				"Value of 'first_name': " . var_export($badFirstName, TRUE);
			$this->Employee->create();
			$this->Employee->set(array('first_name' => $badFirstName));
			$this->Employee->validates(
				array('fieldList' => array('first_name')));
			$this->assertEqual(isset(
				$this->Employee->validationErrors['first_name'][0]), TRUE,
				$assertMessage);
			$this->assertEqual(
				$this->Employee->validationErrors['first_name'][0],
				$validationMessage, $assertMessage);
		}
	}

	public function testBadFirstNameFormat()
	{
		$badFirstNames = array(
			'A.', // Invalid character: '.'
			'A-', // Valid character, but not at end
			'-A', // Valid character, but not at start
			'A--A', // Valid character, but not consecutively
		);

		foreach ($badFirstNames as $badFirstName)
		{
			$assertMessage =
				"Value of 'first_name': " . var_export($badFirstName, TRUE);
			$this->Employee->create();
			$this->Employee->set(array('first_name' => $badFirstName));
			$this->Employee->validates(
				array('fieldList' => array('first_name')));
			$this->assertEqual(isset(
				$this->Employee->validationErrors['first_name'][0]), TRUE,
				$assertMessage);
			$this->assertEqual(
				$this->Employee->validationErrors['first_name'][0],
				AppModel::validationMessageFormat, $assertMessage);
		}
	}

	public function testBadFirstNameNotEmpty()
	{
		$this->Employee->create();
		$this->Employee->validates(array('fieldList' => array('first_name')));
		$this->assertEqual(
			isset($this->Employee->validationErrors['first_name'][0]), TRUE);
		$this->assertEqual($this->Employee->validationErrors['first_name'][0],
			AppModel::validationMessageNotEmpty);

		$this->Employee->create();
		$this->Employee->set(array('first_name' => ''));
		$this->Employee->validates(array('fieldList' => array('first_name')));
		$this->assertEqual(
			isset($this->Employee->validationErrors['first_name'][0]), TRUE);
		$this->assertEqual($this->Employee->validationErrors['first_name'][0],
			AppModel::validationMessageNotEmpty);
	}

	// Bad 'last_name'. -------------------------------------------------------

	public function testBadLastNameBetween()
	{
		$badLastNames = array(
			'i',
			'iiiiiiiiiXiiiiiiiiiXiiiiiiiiiXiiiiiiiiiXiiiiiiiiiXi', // 51 chars
		);
		$validationMessage = sprintf(AppModel::validationMessageBetween,
			$this->Employee->validate['last_name']['between']['rule'][1],
			$this->Employee->validate['last_name']['between']['rule'][2]);

		foreach ($badLastNames as $badLastName)
		{
			$assertMessage =
				"Value of 'last_name': " . var_export($badLastName, TRUE);
			$this->Employee->create();
			$this->Employee->set(array('last_name' => $badLastName));
			$this->Employee->validates(
				array('fieldList' => array('last_name')));
			$this->assertEqual(isset(
				$this->Employee->validationErrors['last_name'][0]), TRUE,
				$assertMessage);
			$this->assertEqual(
				$this->Employee->validationErrors['last_name'][0],
				$validationMessage, $assertMessage);
		}
	}

	public function testBadLastNameFormat()
	{
		$badLastNames = array(
			'A.', // Invalid character: '.'
			'A-', // Valid character, but not at end
			'-A', // Valid character, but not at start
			'A--A', // Valid character, but not consecutively
		);

		foreach ($badLastNames as $badLastName)
		{
			$assertMessage =
				"Value of 'last_name': " . var_export($badLastName, TRUE);
			$this->Employee->create();
			$this->Employee->set(array('last_name' => $badLastName));
			$this->Employee->validates(
				array('fieldList' => array('last_name')));
			$this->assertEqual(isset(
				$this->Employee->validationErrors['last_name'][0]), TRUE,
				$assertMessage);
			$this->assertEqual(
				$this->Employee->validationErrors['last_name'][0],
				AppModel::validationMessageFormat, $assertMessage);
		}
	}

	public function testBadLastNameNotEmpty()
	{
		$this->Employee->create();
		$this->Employee->validates(array('fieldList' => array('last_name')));
		$this->assertEqual(
			isset($this->Employee->validationErrors['last_name'][0]), TRUE);
		$this->assertEqual($this->Employee->validationErrors['last_name'][0],
			AppModel::validationMessageNotEmpty);

		$this->Employee->create();
		$this->Employee->set(array('last_name' => ''));
		$this->Employee->validates(array('fieldList' => array('last_name')));
		$this->assertEqual(
			isset($this->Employee->validationErrors['last_name'][0]), TRUE);
		$this->assertEqual($this->Employee->validationErrors['last_name'][0],
			AppModel::validationMessageNotEmpty);
	}

	// Bad 'first_name'/'last_name' composite. --------------------------------

	public function testBadNameDuplicate()
	{
		$existing = $this->employeeFixtureRecords[0];

		$this->Employee->create();
		$this->Employee->set(array(
			'first_name' => $existing['first_name'],
			'last_name' => $existing['last_name'],
		));
		$this->Employee->validates(
			array('fieldList' => array('first_name', 'last_name')));
		$this->assertEqual(
			isset($this->Employee->validationErrors['first_name'][0]), TRUE);
		$this->assertEqual(
			isset($this->Employee->validationErrors['last_name'][0]), TRUE);
		$this->assertEqual($this->Employee->validationErrors['first_name'][0],
			AppModel::validationMessageUniqueComposite);
		$this->assertEqual($this->Employee->validationErrors['last_name'][0],
			AppModel::validationMessageUniqueComposite);

		// 'Faith Crick' becoming 'Daniel Crick' who already exists.
		$this->Employee->create();
		$this->Employee->set(array('id' => '2', 'first_name' => 'Daniel'));
		$this->Employee->validates(
			array('fieldList' => array('id', 'first_name')));
		$this->assertEqual(
			isset($this->Employee->validationErrors['first_name'][0]), TRUE);
		$this->assertEqual($this->Employee->validationErrors['first_name'][0],
			AppModel::validationMessageUniqueComposite);

		// 'Daniel Crick' becoming 'Daniel Morton' who already exists.
		$this->Employee->create();
		$this->Employee->set(array('id' => '3', 'last_name' => 'Morton'));
		$this->Employee->validates(
			array('fieldList' => array('id', 'last_name')));
		$this->assertEqual(
			isset($this->Employee->validationErrors['last_name'][0]), TRUE);
		$this->assertEqual($this->Employee->validationErrors['last_name'][0],
			AppModel::validationMessageUniqueComposite);
	}

	// Model method tests. ----------------------------------------------------

	public function testFindActive()
	{
		$expected = $this->Employee->find('all', array(
			'conditions' => array(
				'active' => 1,
			),
		));
		$actual = $this->Employee->findActive();
		$this->assertEqual($actual, $expected);
	}

	public function testFindActiveList()
	{
		$expected = $this->Employee->find('list', array(
			'conditions' => array(
				'active' => 1,
			),
		));
		$actual = $this->Employee->findActiveList();
		$this->assertEqual($actual, $expected);
	}

	public function testFindInactive()
	{
		$expected = $this->Employee->find('all', array(
			'conditions' => array(
				'active' => 0,
			),
		));
		$actual = $this->Employee->findInactive();
		$this->assertEqual($actual, $expected);
	}

	public function testFindInactiveList()
	{
		$expected = $this->Employee->find('list', array(
			'conditions' => array(
				'active' => 0,
			),
		));
		$actual = $this->Employee->findInactiveList();
		$this->assertEqual($actual, $expected);
	}

	// Good 'active'. ---------------------------------------------------------

	public function testGoodActiveBoolean()
	{
		// No 'active' value, but it has a default.
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('active'))), TRUE);

		$goodActives = array(0, 1, FALSE, '1');

		foreach ($goodActives as $goodActive)
		{
			$assertMessage =
				"Value of 'active': " . var_export($goodActive, TRUE);
			$this->Employee->create();
			$this->Employee->set(array('active' => $goodActive));
			$this->assertEqual($this->Employee->validates(array(
				'fieldList' => array('active'))), TRUE, $assertMessage);
		}
	}

	// Good 'first_name'. -----------------------------------------------------

	// In this test, 'id' is being specified as if we were performing an
	// update. This is to prevent 'isUniqueComposite()' causing a validation
	// failure when a first name is specified without a last name.
	public function testGoodFirstNameBetween()
	{
		$goodFirstNames = array(
			'ii',
			'iiiiiiiiiXiiiiiiiiiXiiiiiiiiiXiiiiiiiiiXiiiiiiiiiX', // 50 chars
		);

		foreach ($goodFirstNames as $goodFirstName)
		{
			$assertMessage =
				"Value of 'first_name': " . var_export($goodFirstName, TRUE);
			$this->Employee->create();
			$this->Employee->set(
				array('id' => '1', 'first_name' => $goodFirstName));
			$this->assertEqual($this->Employee->validates(array(
				'fieldList' => array('first_name'))), TRUE, $assertMessage);
		}
	}

	public function testGoodFirstNameFormat()
	{
		$this->Employee->create();
		$this->Employee->set(array(
			'id' => '1',
			'first_name' => "O Briain-O'Connor-Jones",
		));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('first_name'))), TRUE);
	}

	// Good 'last_name'. ------------------------------------------------------

	// In this test, 'id' is being specified as if we were performing an
	// update. This is to prevent 'isUniqueComposite()' causing a validation
	// failure when a first name is specified without a last name.
	public function testGoodLastNameBetween()
	{
		$goodLastNames = array(
			'ii',
			'iiiiiiiiiXiiiiiiiiiXiiiiiiiiiXiiiiiiiiiXiiiiiiiiiX', // 50 chars
		);

		foreach ($goodLastNames as $goodLastName)
		{
			$assertMessage =
				"Value of 'last_name': " . var_export($goodLastName, TRUE);
			$this->Employee->create();
			$this->Employee->set(
				array('id' => '1', 'last_name' => $goodLastName));
			$this->assertEqual($this->Employee->validates(array(
				'fieldList' => array('last_name'))), TRUE, $assertMessage);
		}
	}

	public function testGoodLastNameFormat()
	{
		$this->Employee->create();
		$this->Employee->set(array(
			'id' => '1',
			'last_name' => "O Briain-O'Connor-Jones",
		));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('last_name'))), TRUE);
	}
}
