<?php
App::uses('ModelBehavior', 'Model');

class UniqueCompositeBehavior extends ModelBehavior
{
	// '$columnNames': an array of the names of the columns which are
	// composite-unique.
	// To cause this method only to perform the validity check once for each
	// set of composite-unique columns, if the method finds that there's a
	// column with a specified value earlier in the column name list than the
	// current column, it will return 'TRUE'.
	public function isUniqueComposite(Model $model,
		$validateField, $columnNames)
	{
		// Sort column names to make sure that all calls to this method use the
		// column name list in the same order (as part of preventing multiple
		// validity checks for a single group of composite-unique columns).
		sort($columnNames);

		$modelDataFields = $model->data[$model->alias];

		reset($validateField);
		$thisColumnName = key($validateField);
		$firstSpecifiedColumn = TRUE;
		$newCompositeValues = array();

Debugger::dump("Validation of: $thisColumnName");
Debugger::dump($modelDataFields);
		// Set up an array of all the specified values for the unique-composite
		// columns. For an insert, this should be all of them; for an update,
		// this may not be all.
		foreach ($columnNames as $columnName)
		{
			if (isset($modelDataFields[$columnName]) == TRUE)
			{
Debugger::dump("- $columnName");
				// If the first composite unique column with a supplied value
				// is not the column that caused this validity check to be
				// called, then presumably the validity check has already been
				// performed, so we can stop here.
				if ($firstSpecifiedColumn == TRUE &&
					$columnName != $thisColumnName)
				{
Debugger::dump("Validation already performed: $columnName");
					return TRUE;
				}

				$newCompositeValues[$columnName] =
					$modelDataFields[$columnName];
				$firstSpecifiedColumn = FALSE;
			}
		}
Debugger::dump("Validation being performed");

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
