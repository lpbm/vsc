<?php
// \vsc\import (VSC_FIXTURE_PATH);

// \vsc\import ('application');
// \vsc\import ('controllers');
// \vsc\import ('processors');
// \vsc\import ('sitemaps');
// \vsc\import ('presentation');
// \vsc\import ('responses');
// \vsc\import ('requests');
// \vsc\import ('views');

use vsc\presentation\views\vscViewA;
use vsc\presentation\views\vscXhtmlView;
use vsc\presentation\responses\vscHttpResponseA;

class vscHtmlFrontControllerTest extends \PHPUnit_Framework_TestCase  {
	/**
	 * @var vscXhtmlController
	 */
	private $state;

	public function setUp () {
		$this->state = new \vsc\application\controllers\vscXhtmlController();

		$oMap = new vscControllerMap(__FILE__, '\A.*\Z');
		$this->state->setMap($oMap);
	}

	public function tearDown () {
		$this->state = null;
	}

	public function testGetResponse() {
		$oReq = new vscPopulatedRequest();
		$this->assertInstanceOf('vscHttpResponseA', $this->state->getResponse($oReq));
	}

	public function testGetDefaultView() {
		$v = $this->state->getDefaultView();
		$this->assertInstanceOf('vscViewA', $v);
		$this->assertInstanceOf('vscXhtmlView', $v);
	}
}
