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
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'active' => array('type' => 'integer', 'null' => false, 'default' => '1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'last_name' => array('column' => 'last_name', 'unique' => 0)
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
			'id' => '1',
			'first_name' => 'Daniel',
			'last_name' => 'Morton',
			'active' => '1',
			'created' => '2013-09-20 10:13:47',
			'modified' => '2013-09-20 10:13:47'
		),
		array(
			'id' => '2',
			'first_name' => 'Faith',
			'last_name' => 'Crick',
			'active' => '1',
			'created' => '2013-09-20 10:13:47',
			'modified' => '2013-09-20 10:13:47'
		),
		array(
			'id' => '3',
			'first_name' => 'Daniel',
			'last_name' => 'Crick',
			'active' => '0',
			'created' => '2013-09-20 10:15:04',
			'modified' => '2013-09-20 10:15:04'
		),
	);
}
