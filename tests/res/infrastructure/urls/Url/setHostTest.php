<?php
/**
 * @author Marius Orcsik <marius@habarnam.ro>
 * @created 2015-07-03
 */
namespace tests\infrastructure\urls;

use vsc\infrastructure\urls\Url;

/**
 * Class setHostTest
 * @package tests\infrastructure\urls
 * @covers vsc\infrastructure\urls\Url::setHost()
 */
class setHostTest extends \PHPUnit_Framework_TestCase
{
	public function testBasicSetHost () {
		$value = uniqid('test:');
		$url = new Url();
		$url->setHost($value);
		$this->assertEquals($value, $url->getHost());
	}
}
