<?php
vsc\import ('application');
vsc\import ('processors');
class vscEmptyProcessorFixture extends vscProcessorA {
	protected $aLocalVars = array ('test' => null);

	public function init () {}

	public function handleRequest (vscHttpRequestA $oHttpRequest) {}
}
