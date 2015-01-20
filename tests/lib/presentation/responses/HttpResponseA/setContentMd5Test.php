<?php
namespace tests\lib\presentation\responses\HttpResponseA;
use vsc\presentation\responses\HttpResponseA;

/**
 * @covers \vsc\presentation\responses\HttpResponseA::setContentMd5()
 */
class setContentMd5 extends \PHPUnit_Framework_TestCase
{
	public function testBasicSetContentMd5()
	{
		$o = new HttpResponseA_underTest_setContentMd5();
		$sTest = 'test';
		$o->setContentMd5($sTest);

		$this->assertEquals($sTest, $o->getContentMd5());
	}
}

class HttpResponseA_underTest_setContentMd5 extends HttpResponseA {}