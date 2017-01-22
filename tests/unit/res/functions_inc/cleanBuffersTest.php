<?php
namespace tests\res\functions_inc;

class cleanBuffers extends \PHPUnit_Framework_TestCase
{
	public function testBasicCleanBuffers()
	{
		$this->markTestSkipped('New buffer rules');
		$s = ob_end_clean(); // phpunit buffer
		$output = 'asd';
		ob_start();
		$this->assertEquals(1, ob_get_level());
		echo $output;
		$errors = \vsc\cleanBuffers();
		$this->assertEquals(0, ob_get_level());

		$this->assertEquals(0, count($errors));
		ob_start(); // phpunit's buffer
	}
}
