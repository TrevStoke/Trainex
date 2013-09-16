<?php
/**
 * EmployeeFixture
 *
 */
class EmployeeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'active' => array('type' => 'integer', 'null' => false, 'default' => '1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name' => array('column' => 'name', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Andrew Cornes',
			'active' => 1,
			'created' => '2013-09-16 14:28:05',
			'modified' => '2013-09-16 14:28:05',
		),
		array(
			'id' => 2,
			'name' => 'Trevor Adams',
			'active' => 1,
			'created' => '2013-09-16 14:28:05',
			'modified' => '2013-09-16 14:28:05',
		),
		array(
			'id' => 3,
			'name' => 'Karen Woods',
			'active' => 0,
			'created' => '2013-09-16 14:28:05',
			'modified' => '2013-09-16 14:28:05',
		),
	);
}
