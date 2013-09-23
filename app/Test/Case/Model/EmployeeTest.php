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
		$this->Employee->set(array('first_name' => '1'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('first_name'))), FALSE);

		// 51 chars.
		$this->Employee->set(array('first_name' =>
			'123456789 123456789 123456789 123456789 123456789 1'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('first_name'))), FALSE);
	}

	public function testBadLastNameLength()
	{
		$this->Employee->set(array('last_name' => '1'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('last_name'))), FALSE);

		// 51 chars.
		$this->Employee->set(array('last_name' =>
			'123456789 123456789 123456789 123456789 123456789 1'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('last_name'))), FALSE);
	}

	public function testBadNameDuplicate()
	{
		$this->Employee->set(array(
			'first_name' => 'Daniel',
			'last_name' => 'Morton',
		));
		$this->assertEqual($this->Employee->validates(array('fieldList' =>
			array('first_name', 'last_name'))), FALSE);
	}

	public function testGoodActive()
	{
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

	public function testGoodFirstNameLength()
	{
		$this->Employee->set(array('first_name' => '12'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('first_name'))), TRUE);

		// 50 chars.
		$this->Employee->set(array('first_name' =>
		'123456789 123456789 123456789 123456789 1234567890'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('first_name'))), TRUE);
	}

	public function testGoodLastNameLength()
	{
		$this->Employee->set(array('last_name' => '12'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('last_name'))), TRUE);

		// 50 chars.
		$this->Employee->set(array('last_name' =>
		'123456789 123456789 123456789 123456789 1234567890'));
		$this->assertEqual($this->Employee->validates(array(
			'fieldList' => array('last_name'))), TRUE);
	}

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
}
