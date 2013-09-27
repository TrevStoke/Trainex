<?php
App::uses('Employee', 'Model');

/**
 * Employee Test Case
 *
 * @property Employee $Employee
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

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Employee = ClassRegistry::init('Employee');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Employee);

		parent::tearDown();
	}

	public function testBadActive()
	{
		$this->Employee->set(array('active' => -1));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('active'))), FALSE);

		$this->Employee->set(array('active' => 2));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('active'))), FALSE);

		$this->Employee->set(array('active' => '2'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('active'))), FALSE);
	}

	public function testBadFirstNameLength()
	{
		// Too short.
		$this->Employee->set(array('first_name' => '1'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('first_name'))), FALSE);

		// Too long: 51 chars.
		$this->Employee->set(array('first_name' =>
			'123456789 123456789 123456789 123456789 123456789 1'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('first_name'))), FALSE);
	}

	public function testBadLastNameLength()
	{
		// Too short.
		$this->Employee->set(array('last_name' => '1'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('last_name'))), FALSE);

		// Too long: 51 chars.
		$this->Employee->set(array('last_name' =>
			'123456789 123456789 123456789 123456789 123456789 1'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('last_name'))), FALSE);
	}

	public function testBadNameDuplicate()
	{
		// 'Daniel Morton' already exists.
		$this->Employee->set(array(
			'first_name' => 'Daniel',
			'last_name' => 'Morton',
		));
		$this->assertEqual($this->Employee->validates(array('fieldList' =>
			array('first_name', 'last_name'))), FALSE);

		// 'Faith Crick' becoming 'Daniel Crick' who already exists.
		$this->Employee->set(array('id' => '2', 'first_name' => 'Daniel'));
		$this->assertEqual($this->Employee->validates(array('fieldList' =>
		array('id', 'last_name'))), FALSE);

		// 'Daniel Crick' becoming 'Daniel Morton' who already exists.
		$this->Employee->set(array('id' => '3', 'last_name' => 'Morton'));
		$this->assertEqual($this->Employee->validates(array('fieldList' =>
			array('id', 'last_name'))), FALSE);
	}

	public function testGoodActive()
	{
		// No 'active' value, but it has a default.
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('active'))), TRUE);

		$this->Employee->set(array('active' => 0));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('active'))), TRUE);

		$this->Employee->set(array('active' => 1));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('active'))), TRUE);

		$this->Employee->set(array('active' => FALSE));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('active'))), TRUE);

		$this->Employee->set(array('active' => '1'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('active'))), TRUE);
	}

	// In this test, 'id' is being specified as if we were performing an
	// update. This is to prevent 'isUniqueComposite()' causing a validation
	// failure when a first name is specified without a last name.
	public function testGoodFirstNameLength()
	{
		// Minimum length: 2 chars.
		$this->Employee->set(array('id' => '1', 'first_name' => '12'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('first_name'))), TRUE);

		// Maximum length: 50 chars.
		$this->Employee->set(array(
			'id' => '1',
			'first_name' =>
				'123456789 123456789 123456789 123456789 1234567890',
		));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('first_name'))), TRUE);
	}

	// In this test, 'id' is being specified as if we were performing an
	// update. This is to prevent 'isUniqueComposite()' causing a validation
	// failure when a last name is specified without a first name.
	public function testGoodLastNameLength()
	{
		// Minimum length: 2 chars.
		$this->Employee->set(array('id' => '1', 'last_name' => '12'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('last_name'))), TRUE);

		// Maximum length: 50 chars.
		$this->Employee->set(array(
			'id' => 1,
			'last_name' =>
				'123456789 123456789 123456789 123456789 1234567890',
		));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('last_name'))), TRUE);
	}

	public function testFindActiveEmployees()
	{
		$expected = $this->Employee->find('all', array(
			'conditions' => array(
				'active' => 1,
			),
		));
		$actual = $this->Employee->findActive();
		$this->assertEqual($actual, $expected);
	}

	public function testFindInactiveEmployees()
	{
		$expected = $this->Employee->find('all', array(
			'conditions' => array(
				'active' => 0,
			),
		));
		$actual = $this->Employee->findInactive();
		$this->assertEqual($actual, $expected);
	}
}
