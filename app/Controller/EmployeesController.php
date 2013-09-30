<?php
App::uses('AppController', 'Controller');

/**
 * Class EmployeesController
 * @property Employee $Employee
 */
class EmployeesController extends AppController
{
	public $components = array('RequestHandler');

	public function view($id = NULL)
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

	// Private ----------------------------------------------------------------

	private function output($results)
	{
		$this->set(array(
			'output' => $results,
			'_serialize' => array('output'),
		));
	}
}
