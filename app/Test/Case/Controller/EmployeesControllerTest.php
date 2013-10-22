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
		'app.employee'
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
		$result = $this->testAction('/employees/view/1');
		debug($result);
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
