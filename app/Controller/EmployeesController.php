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
		if ($this->request->is('POST') == FALSE)
		{
			throw new MethodNotAllowedException('Only POST allowed');
		}

		if (isset($this->request->data
			[$this->Employee->alias][$this->Employee->primaryKey]) == TRUE)
		{
			throw new ForbiddenException(
				'Primary key cannot be specified for an add');
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
		if ($this->request->is('GET') == FALSE)
		{
			throw new MethodNotAllowedException('Only GET allowed');
		}

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
		if ($this->request->is('GET') == FALSE)
		{
			throw new MethodNotAllowedException('Only GET allowed');
		}

		$active = $this->Employee->findActive();
		$this->output($active);
	}

	public function view_active_list()
	{
		if ($this->request->is('GET') == FALSE)
		{
			throw new MethodNotAllowedException('Only GET allowed');
		}

		$activeList = $this->Employee->findActiveList();
		$this->output($activeList);
	}

	public function view_inactive()
	{
		if ($this->request->is('GET') == FALSE)
		{
			throw new MethodNotAllowedException('Only GET allowed');
		}

		$inactive = $this->Employee->findInactive();
		$this->output($inactive);
	}

	public function view_inactive_list()
	{
		if ($this->request->is('GET') == FALSE)
		{
			throw new MethodNotAllowedException('Only GET allowed');
		}

		$inactiveList = $this->Employee->findInactiveList();
		$this->output($inactiveList);
	}
}
