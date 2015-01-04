<?php
namespace tests\lib\presentation\views\ViewA;
use fixtures\presentation\views\testView;
use vsc\application\sitemaps\ClassMap;
use fixtures\domain\models\ModelFixture;

/**
 * @covers \vsc\presentation\views\ViewA::fetch()
 */
class fetch extends \PHPUnit_Framework_TestCase
{
	public function testFetch ()
	{
		$o = new testView();

		$t = '';
		try {
			$o->fetch ( $t );
		} catch (\Exception $e) {
			$this->assertInstanceOf(\vsc\Exception::class, $e);
			$this->assertInstanceOf(\vsc\ExceptionPath::class, $e);
		}

		$t = 'main.tpl.php';
		$oMap = new ClassMap(__FILE__, '\A.*\Z');

		$oMap->setTemplatePath(VSC_FIXTURE_PATH . 'templates/');
		$oMap->setTemplate($t);

		$o->setMap($oMap);

		$f = new ModelFixture();
		$o->setModel ($f);

		$output = $o->fetch($t);
		$this->assertEquals(file_get_contents(VSC_FIXTURE_PATH . 'templates/' . $t), $output);
	}
}
