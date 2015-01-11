<?php
namespace tests\lib\application\sitemaps\ProcessorMapT;
use vsc\application\sitemaps\MappingA;
use vsc\application\sitemaps\ProcessorMapT;

/**
 * @covers \vsc\application\sitemaps\ProcessorMapT::getViewHelpers()
 */
class getViewHelpers extends \PHPUnit_Framework_TestCase
{
	public function testEmptyAtInitialization()
	{
		$o = new ProcessorMapT_underTest_getViewHelpers(__FILE__, '.*');
		$this->assertEmpty($o->getViewHelpers());
	}
}

class ProcessorMapT_underTest_getViewHelpers extends MappingA {
	use ProcessorMapT;
}
