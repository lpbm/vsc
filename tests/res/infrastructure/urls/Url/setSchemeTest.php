<?php
/**
 * @author Marius Orcsik <marius.orcsik@rocket-internet.de>
 * @copyright Copyright (c) 2015 Rocket Internet SE, Johannisstraße 20, 10117 Berlin, http://www.rocket-internet.de
 * @created 2015-07-03
 */
namespace tests\infrastructure\urls;

use vsc\infrastructure\urls\Url;

/**
 * Class setSchemeTest
 * @package tests\infrastructure\urls
 * @covers vsc\infrastructure\urls\Url::setScheme()
 */
class setSchemeTest extends \PHPUnit_Framework_TestCase
{
	public function testBasicSetScheme () {
		$value = 'https';
		$url = new Url();
		$url->setScheme($value);
		$this->assertEquals($value, $url->getScheme());
	}
}
