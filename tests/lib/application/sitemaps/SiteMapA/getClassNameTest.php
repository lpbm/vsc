<?php
namespace tests\lib\application\sitemaps\SiteMapA;
use vsc\application\sitemaps\SiteMapA;

/**
 * @covers \vsc\application\sitemaps\SiteMapA::getClassName()
 */
class getClassName extends \PHPUnit_Framework_TestCase
{
	public function testBasicGetClassName()
	{
		$sProcessorPath = VSC_MOCK_PATH . 'application/processors/ProcessorFixture.php';
		$this->assertEquals('stdClass', SiteMapA::getClassName($sProcessorPath));
	}
}
