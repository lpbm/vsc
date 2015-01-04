<?php
namespace tests\lib\presentation\views\ViewA;
use fixtures\presentation\views\testView;
use vsc\application\sitemaps\ClassMap;

/**
 * @covers \vsc\presentation\views\ViewA::setTemplate()
 */
class setTemplate extends \PHPUnit_Framework_TestCase
{
	public function testSetTemplate ()
	{
		$o = new testView();

		$oMap = new ClassMap(__FILE__, '\A.*\Z');

		$oMap->setTemplatePath(VSC_FIXTURE_PATH . 'templates/');
		$oMap->setTemplate('main.tpl.php');

		$o->setMap($oMap);

		$this->assertEquals($oMap->getTemplate(), $o->getTemplate());
		$this->assertEquals($oMap->getTemplatePath(), $o->getTemplatePath());
	}

	public function testSetTemplateBroken ()
	{
		$o = new testView();

		$t = '';
		try {
			$o->setTemplate ( $t );
		} catch (\Exception $e) {
			$this->assertInstanceOf(\vsc\Exception::class, $e);
			$this->assertInstanceOf(\vsc\ExceptionPath::class, $e);
		}

		$this->assertEmpty($o->getTemplate());
	}
}
