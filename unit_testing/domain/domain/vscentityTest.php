<?php
/**
 * @package domain
 * @subpackage domain
 * @author marius orcsik <marius@habarnam.ro>
 */
include_once ('fixtures/dummytable.class.php');

class vscEntityTest extends Snap_UnitTestCase {
	/**
	 * @var vscDomainObjectA
	 */
	private $state;

	public function setUp() {
		// begin transaction shit - if the case
		$this->state = new dummyTable();
	}

	public function tearDown () {
		unset ($this->state);
	}

	public function testInstantiation (){
		$this->assertIsA($this->state, 'dummyTable');
		$this->assertIsA($this->state, 'vscDomainObjectA');
	}

	public function testFields () {
		foreach ($this->state->getFields() as $oColumn) {
			$this->assertIsA($oColumn, 'vscFieldA', 'Column ' . var_export($oColumn, true) . ' is not a valid vscField');
		}
	}

	public function testPrimaryKey () {
		$this->state->setPrimaryKey($this->state->payload);
		$this->assertIsA($this->state->getPrimaryKey(), 'vscKeyPrimary');
	}

	public function testGetter () {
		$value = $this->state->getPayload ();
		$this->assertEqual ($value, 2);

		$value = $this->state->getId();
		$this->assertNull($value);
	}

	public function testSetter () {
		$this->state->setPayload (1);
		$value = $this->state->getPayload();

		$this->assertEqual ($value, 1);


		$this->state->setPayload (null);
		$value = $this->state->getPayload();

		$this->assertNull ($value);
	}

	public function testFromArray () {
		$values = array (
			'id' 		=> 1,
			'payload'	=> 'Ana are mere !! test" asd" ',
			'timestamp'	=> date('Y-m-d G:i:s'),
		);

		$this->state->fromArray ($values);

		$this->assertEqual($values['id'], 			$this->state->getId());
		$this->assertEqual($values['payload'], 		$this->state->getPayload());
		$this->assertEqual($values['timestamp'], 	$this->state->getTimestamp());
	}

	public function testToArray () {
		$values = array (
			'id' 		=> 1,
			'payload'	=> 'Ana are mere !! test" asd" ',
			'timestamp'	=> date('Y-m-d G:i:s'),
		);

		$this->state->fromArray ($values);

		$values2 = $this->state->toArray ();

		$this->assertEqual($values['id'], 			$values2['id']);
		$this->assertEqual($values['payload'], 		$values2['payload']);
		$this->assertEqual($values['timestamp'], 	$values2['timestamp']);
	}

	public function testJoinObjects () {
		$a = new dummyTable();

		$this->state->join ($a, $this->state->getPrimaryKey(), $a->getPrimaryKey());
		d ($this->state);

		$this->assertIsA($this->state, 'dummyTable');
	}
}
