<?php
define ('BASE_PATH', dirname (__FILE__) . '/fixtures/');
import ('application/dispatchers');

class vscRwDispatcherTest  extends Snap_UnitTestCase {
	private $state;

	public function setUp () {
		$this->state = new vscRwDispatcher();
	}
	public function tearDown () {
		$this->state = null;
		
	}

	public function testLoadSiteMap () {
		$this->state->loadSiteMap (BASE_PATH . 'config/map.php');
		return $this->assertIsA ($this->state->getSiteMap(), 'vscSiteMapA');
	}

	public function testGetRequest () {
		$oReq = $this->state->getRequest();

		import ('application');
		$oBlaReq = vsc::getHttpRequest();

		return $this->assertIdentical ($oReq, $oBlaReq);
	}

	public function testGetFrontController () {

		$this->state->loadSiteMap (BASE_PATH . 'config/map.php');

		$oFront = $this->state->getFrontController();

		return $this->assertIsA($oFront, 'vscFrontControllerA');
	}

	public function testGetProcessController404 () {
		$this->state->loadSiteMap (BASE_PATH . '/config/map.php');

		$oProcess = $this->state->getProcessController();
		
		return $this->assertIsA($oProcess, 'vsc404Processor');
	}

	public function testGetMapsMap () {

		$this->state->loadSiteMap (BASE_PATH . 'config/map.php');
		$sCurPath = realpath(dirname (__FILE__) . '/../../presentation/requests/fixtures/vscpopulatedrequest.class.php');
		include ($sCurPath);
		$oBlaReq = new vscPopulatedRequest ();
		//d ($this->state->getRequest());
		//d ($this->state->getProcessController());
		return $this->assertIsA ($this->state->getSiteMap(), 'vscSiteMapA');
	}
}
