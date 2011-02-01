<?php
/* Ganho Fixture generated on: 2011-01-31 23:22:26 : 1296523346 */
class GanhoFixture extends CakeTestFixture {
	var $name = 'Ganho';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'usuario_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'agendamento_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'fonte_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'valor' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'datadabaixa' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'datadevencimento' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'observacoes' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'status' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'conta_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fonte_id' => array('column' => 'fonte_id', 'unique' => 0), 'agendamento_id' => array('column' => 'agendamento_id', 'unique' => 0), 'usuario_id' => array('column' => 'usuario_id', 'unique' => 0)),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'usuario_id' => 1,
			'agendamento_id' => 1,
			'fonte_id' => 1,
			'valor' => 1,
			'datadabaixa' => '2011-01-31',
			'datadevencimento' => '2011-01-31',
			'observacoes' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-01-31 23:22:26',
			'modified' => '2011-01-31 23:22:26',
			'status' => 1,
			'conta_id' => 1
		),
	);
}
?>