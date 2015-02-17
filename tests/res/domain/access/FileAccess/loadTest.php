<?php
namespace tests\res\domain\access\FileAccess;
use vsc\domain\access\FileAccess;

/**
 * @covers \vsc\domain\access\FileAccess::load()
 */
class load extends \PHPUnit_Framework_TestCase
{
	public function testLoadFileWithoutCache()
	{
		$o = new FileAccess(__FILE__);
		$o->setCachePath(VSC_FIXTURE_PATH);

		$this->assertEquals(file_get_contents(__FILE__), $o->load());
	}

	public function testLoadFileWithCache()
	{
		$value = uniqid('test:');
		$file = uniqid('test:');
		$o = new FileAccess(__FILE__);
		$o->setCachePath(VSC_FIXTURE_PATH);
		$o->cacheFile($file, $value);

		$sig = $o->getSignature($file);
		$this->assertTrue(is_file(VSC_FIXTURE_PATH . $sig));
		$this->assertEquals($value, file_get_contents(VSC_FIXTURE_PATH . $sig));

		$this->assertEquals(file_get_contents(__FILE__), $o->load());
		unlink(VSC_FIXTURE_PATH . $sig);
	}
}
