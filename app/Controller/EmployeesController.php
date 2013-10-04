<?php
App::uses('AppController', 'Controller');

/**
 * Class EmployeesController
 * @property Employee $Employee
 */
class EmployeesController extends AppController
{
	public $components = array('RequestHandler');

	public function test_v()
	{
		$list = $this->Employee->find('list');
		$this->output($list);
	}

	public function view($id = FALSE)
	{
		$this->Employee->id = $id;
		$employee = $this->Employee->findCurrent();
		$this->output($employee);
	}

	public function view_active()
	{
		$active = $this->Employee->findActive();
		$this->output($active);
	}

	public function view_inactive()
	{
		$inactive = $this->Employee->findInactive();
		$this->output($inactive);
	}
}
