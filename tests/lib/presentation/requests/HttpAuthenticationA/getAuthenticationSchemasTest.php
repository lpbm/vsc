<?php
namespace tests\lib\presentation\requests\HttpAuthenticationA;
use vsc\presentation\requests\HttpAuthenticationA;
use vsc\presentation\requests\BasicHttpAuthentication;

/**
 * @covers \vsc\presentation\requests\HttpAuthenticationA::getAuthenticationSchemas()
 */
class getAuthenticationSchemas extends \PHPUnit_Framework_TestCase
{
	public function testIncomplete()
	{
		$BasicAuthentication = ['Basic'];
		$DigestAuthentication = ['Digest'];

		$this->assertEquals ([], HttpAuthenticationA::getAuthenticationSchemas(HttpAuthenticationA::NONE));
		$this->assertEquals ($BasicAuthentication, HttpAuthenticationA::getAuthenticationSchemas(HttpAuthenticationA::BASIC));
		$this->assertEquals ($DigestAuthentication, HttpAuthenticationA::getAuthenticationSchemas(HttpAuthenticationA::DIGEST));
		$this->assertEquals (
			array_merge($BasicAuthentication, $DigestAuthentication),
			HttpAuthenticationA::getAuthenticationSchemas(HttpAuthenticationA::DIGEST | HttpAuthenticationA::BASIC)
		);
	}
}
