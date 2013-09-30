<?php
App::uses('ModelBehavior', 'Model');

class UniqueCompositeBehavior extends ModelBehavior
{
	public function isUniqueComposite(Model $model,
		$validateField, $columnNames)
	{
		$modelDataFields = $model->data[$model->alias];
		$newCompositeValues = array();

		// Set up an array of all the specified values for the unique-composite
		// columns. For an insert, this should be all of them; for an update,
		// this may not be all.
		foreach ($columnNames as $columnName)
		{
			if (isset($modelDataFields[$columnName]) == TRUE)
			{
				$newCompositeValues[$columnName] =
					$modelDataFields[$columnName];
			}
		}

		// If the validation is taking place due to an update, and not all of
		// the unique-composite columns have specified values.
		if (isset($modelDataFields[$model->primaryKey]) == TRUE &&
			count($newCompositeValues) != count($columnNames))
		{
			// Fetch current values for unique-composite columns.
			$currentFieldValues = $model->find('first', array(
				'fields' => $columnNames,
				'conditions' => array(
					'id' => $modelDataFields[$model->primaryKey],
				),
				'recursive' => -1,
			));

			// If not all unique-composite columns have been specified AND
			// there's no row to update in the DB, validation fails.
			if (count($currentFieldValues) == 0)
			{
				return FALSE;
			}

			// Fill in any unspecified unique-composite column values from
			// the current-values row we just found.
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
		// something is wrong, e.g., not all unique-composites given a value
		// as part of an insert (which really should be picked up by the
		// "'required' => 'create'" validation for those columns).
		if (count($newCompositeValues) != count($columnNames))
		{
			return FALSE;
		}

		// If we find anything, validation should fail.
		return $model->find('count', array(
			'conditions' => $newCompositeValues,
		)) === 0;
	}
}
