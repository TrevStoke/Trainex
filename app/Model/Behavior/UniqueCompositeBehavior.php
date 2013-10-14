<?php
App::uses('ModelBehavior', 'Model');

class UniqueCompositeBehavior extends ModelBehavior
{
	// ------------------------------------------------------------------------
	// '$columnNames': an array of the names of the columns which are
	// unique-composite.
	public function isUniqueComposite(Model $model,
		$validateField, $columnNames)
	{
		$modelDataFields = $model->data[$model->alias];
		$newCompositeValues = array();

		// Set up an array of all the specified values for the unique-composite
		// columns. For an insert, this should be all of them; for an update,
		// it may not be all.
		foreach ($columnNames as $columnName)
		{
			if (isset($modelDataFields[$columnName]) == TRUE)
			{
				$newCompositeValues[$columnName] =
					$modelDataFields[$columnName];
			}
		}

		// If the validation is taking place due to an update, and if not all
		// of the unique-composite columns have specified values, fetch current
		// values for the row to be updated from the DB to fill in the blanks.
		if (isset($modelDataFields[$model->primaryKey]) == TRUE &&
			count($newCompositeValues) != count($columnNames))
		{
			$currentFieldValues = $model->find('first', array(
				'fields' => $columnNames,
				'conditions' => array(
					$model->primaryKey => $modelDataFields[$model->primaryKey],
				),
			));

			if (count($currentFieldValues) == 0)
			{
				return "Employee with id '" .
					$modelDataFields[$model->primaryKey] . "' not found";
			}

			foreach ($currentFieldValues[$model->alias] as
				$columnName => $columnValue)
			{
				if (isset($newCompositeValues[$columnName]) == FALSE)
				{
					$newCompositeValues[$columnName] = $columnValue;
				}
			}
		}

		// If we don't have values for all unique-composite columns by now,
		// something is wrong, e.g., not all unique-composites were given a
		// value as part of an insert (which really should be picked up by the
		// "'required' => 'create'" validation for those columns).
		if (count($newCompositeValues) != count($columnNames))
		{
			return 'Not all values in unique composite specified';
		}

		// If we find a match using the supplied (and perhaps current) values,
		// validation should fail.
		return $model->find('count', array(
			'conditions' => $newCompositeValues,
		)) == 0;
	}
}
