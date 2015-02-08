<?php
namespace tests\res\infrastructure\vsc;
use vsc\infrastructure\vsc;

/**
 * @covers \vsc\infrastructure\vsc::getPaths()
 */
class getPaths extends \PHPUnit_Framework_TestCase
{
	public function testBasicGetPaths()
	{
		$this->assertEquals(explode(PATH_SEPARATOR, get_include_path()), vsc::getPaths());
	}
}
