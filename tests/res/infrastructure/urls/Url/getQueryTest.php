<?php
/**
 * @author Marius Orcsik <marius.orcsik@rocket-internet.de>
 * @copyright Copyright (c) 2015 Rocket Internet SE, Johannisstraße 20, 10117 Berlin, http://www.rocket-internet.de
 * @created 2015-07-03
 */
namespace tests\infrastructure\urls;

use vsc\infrastructure\urls\Url;

/**
 * Class getQueryTest
 * @package tests\infrastructure\urls
 * @covers vsc\infrastructure\urls\Url::getQuery
 */
class getQueryTest extends \PHPUnit_Framework_TestCase
{
	public function testInstantiationIsNull () {
		$url = new Url();
		$this->assertEquals([], $url->getQuery());
	}

	public function testGetQuery () {
		$value = [
			'ana' => 'mere'
		];
		$oUrl = new Url ();
		$oUrl->setQuery($value);
		$this->assertEquals($value, $oUrl->getQuery());
	}
}
