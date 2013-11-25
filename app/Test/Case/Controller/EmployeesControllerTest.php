<?php
App::uses('EmployeesController', 'Controller');

/**
 * EmployeesController Test Case
 *
 */
class EmployeesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.employee',
		'core.cake_session',
	);

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		/*
		$employeesMock = $this->generate('Employees', array(
			'methods' => array(
				'beforeFilter',
				'output',
				'outputError',
				'view',
			),
//			'models' => array(
//				'Employee' => array('read'),
//			),
		));
		$response = $this->testAction('/employees/view/1', array(
			'method' => 'GET',
			'return' => 'vars',
		));
		Debugger::dump($response);
		*/

		$employeeFixture = new EmployeeFixture();
		$employeeFixtureRecords = $employeeFixture->records;

		$expected = $employeeFixtureRecords[0];
		$expected['name'] =
			$expected['first_name'] . ' ' . $expected['last_name'];
		$expected = array('Employee' => $expected);

		$response = $this->testAction('/employees/view/1', array(
			'method' => 'GET',
			'return' => 'vars',
		));
		$results = $response['results'];
		$this->assertEqual($results, $expected);
	}

/**
 * testViewActive method
 *
 * @return void
 */
	public function testViewActive() {
	}

/**
 * testViewActiveList method
 *
 * @return void
 */
	public function testViewActiveList() {
	}

/**
 * testViewInactive method
 *
 * @return void
 */
	public function testViewInactive() {
	}

/**
 * testViewInactiveList method
 *
 * @return void
 */
	public function testViewInactiveList() {
	}

}
