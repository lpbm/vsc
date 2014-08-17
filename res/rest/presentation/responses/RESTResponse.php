<?php
/**
 * @package presentation/response
 * @author marius orcsik <marius@habarnam.ro>
 * @date 2013.10.04
 */
namespace vsc\rest\presentation\responses;

use vsc\presentation\responses\HttpResponseA;
use vsc\infrastructure\vsc;

class RESTResponse extends HttpResponseA {
	protected $sContentType = 'application/json';

	public function outputHeaders() {
		vsc::d (parent::getContentType());
	}
}
