<?php
/**
 * @copyright Copyright (c) 2014 Rocket Internet GmbH, Johannisstra?e 20, 10117 Berlin, http://www.rocket-internet.de
 * @created 2015-03-15
 */
namespace lib\application\controllers\FrontControllerA;
use vsc\application\controllers\FrontControllerA;
use vsc\Exception;
use vsc\presentation\responses\HttpResponse;
use vsc\presentation\responses\HttpResponseType;
use vsc\presentation\views\PlainTextView;
use vsc\presentation\views\ViewA;
use fixtures\presentation\views\NullView;

/**
 * Class getErrorResponseTest
 * @package lib\application\controllers\FrontControllerA
 * @covers \vsc\application\controllers\FrontControllerA::getErrorResponse()
 */
class getErrorResponseTest extends \PHPUnit_Framework_TestCase
{

	public function testBasicGetErrorResponse() {
		$o = new FrontControllerA_underTest_getErrorResponse();

		$errorMessage = uniqid('test:');
		$e = new Exception($errorMessage);

		$response = $o->getErrorResponse($e);
		$this->assertEquals(HttpResponseType::INTERNAL_ERROR, $response->getStatus());
		$this->assertNotFalse(strstr($response->getOutput(), $errorMessage) );
	}
}

class FrontControllerA_underTest_getErrorResponse extends FrontControllerA
{
	/**
	 * @returns ViewA
	 */
	public function getDefaultView()
	{
		return new PlainTextView();
	}
}
