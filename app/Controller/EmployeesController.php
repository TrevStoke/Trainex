<?php
App::uses('AppController', 'Controller');

/**
 * Class EmployeesController
 * @property Employee $Employee
 */
class EmployeesController extends AppController
{
	public function add()
	{
		if ($this->request->is('post') == FALSE)
		{
			throw new MethodNotAllowedException();
		}

		$this->Employee->create();

		if (($saveResponse = $this->Employee->save($this->request->data)) ===
			FALSE)
		{
			$this->outputError($this->Employee->validationErrors);
		}
		else
		{
			$this->output($saveResponse);
		}
	}

	public function view($id = FALSE)
	{
		$this->Employee->id = $id;
		$this->Employee->read();

		if (count($this->Employee->data) == 0)
		{
			throw new NotFoundException();
		}

		$this->output($this->Employee->data);
	}

	public function view_active()
	{
		$active = $this->Employee->findActive();
		$this->output($active);
	}

	public function view_active_list()
	{
		$activeList = $this->Employee->findActiveList();
		$this->output($activeList);
	}

	public function view_inactive()
	{
		$inactive = $this->Employee->findInactive();
		$this->output($inactive);
	}

	public function view_inactive_list()
	{
		$inactiveList = $this->Employee->findInactiveList();
		$this->output($inactiveList);
	}
}
