<?php
namespace tests\lib\presentation\requests\CookieRequestTrait;
use mocks\presentation\requests\PopulatedRequest;

/**
 * @covers \vsc\presentation\requests\CookieRequestTrait::hasCookieVar()
 */
class hasCookieVar extends \PHPUnit_Framework_TestCase
{
	public function testHasCookieVar() {
		$o = new PopulatedRequest();
		// Cookie var
		$this->assertTrue($o->hasCookieVar('user')); // 'user' => 'asddsasdad234'
	}

}
