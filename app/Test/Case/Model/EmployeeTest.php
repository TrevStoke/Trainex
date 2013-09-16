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

	public function testAddBadLengthName()
	{
		$data[$this->Employee->alias]['name'] = '123';
		$this->Employee->create();
		$this->assertEqual($this->Employee->save($data), FALSE);

		$data[$this->Employee->alias]['name'] =
			'123456789 123456789 123456789 123456789 123456789 1'; // 51 chars.
		$this->Employee->create();
		$this->assertEqual($this->Employee->save($data), FALSE);
	}

	public function testAddDuplicateName()
	{
		$data[$this->Employee->alias]['name'] = 'Andrew Cornes';
		$this->Employee->create();
		$this->assertEqual($this->Employee->save($data), FALSE);
	}

	public function testAddGoodLengthName()
	{
		$data[$this->Employee->alias]['name'] = '1234';
		$this->Employee->create();
		$this->assertNotEqual($this->Employee->save($data), FALSE);

		$data[$this->Employee->alias]['name'] =
			'123456789 123456789 123456789 123456789 123456789'; // 50 chars.
		$this->Employee->create();
		$this->assertNotEqual($this->Employee->save($data), FALSE);
	}

	public function testAddInvalidActive()
	{
		$data[$this->Employee->alias]['name'] = 'New Name';
		$data[$this->Employee->alias]['active'] = -1;
		$this->Employee->create();
		$this->assertEqual($this->Employee->save($data), FALSE);

		$data[$this->Employee->alias]['active'] = 2;
		$this->Employee->create();
		$this->assertEqual($this->Employee->save($data), FALSE);

		$data[$this->Employee->alias]['active'] = '2';
		$this->Employee->create();
		$this->assertEqual($this->Employee->save($data), FALSE);
	}

	public function testAddValidActive()
	{
		$data[$this->Employee->alias]['name'] = 'New Name 0';
		$this->Employee->create();
		$this->assertNotEqual($this->Employee->save($data), FALSE);

		$data[$this->Employee->alias]['name'] = 'New Name 1';
		$data[$this->Employee->alias]['active'] = 0;
		$this->Employee->create();
		$this->assertNotEqual($this->Employee->save($data), FALSE);

		$data[$this->Employee->alias]['name'] = 'New Name 2';
		$data[$this->Employee->alias]['active'] = 1;
		$this->Employee->create();
		$this->assertNotEqual($this->Employee->save($data), FALSE);

		$data[$this->Employee->alias]['name'] = 'New Name 3';
		$data[$this->Employee->alias]['active'] = FALSE;
		$this->Employee->create();
		$this->assertNotEqual($this->Employee->save($data), FALSE);

		$data[$this->Employee->alias]['name'] = 'New Name 4';
		$data[$this->Employee->alias]['active'] = '1';
		$this->Employee->create();
		$this->assertNotEqual($this->Employee->save($data), FALSE);
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
