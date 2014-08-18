<?php
/**
 * @package application
 * @subpackage sitemaps
 * @author marius orcisk <marius@habarnam.ro>
 * @date 2010.12.05
 */
namespace vsc\application\sitemaps;

use vsc\presentation\helpers\ViewHelperA;
use vsc\presentation\requests\HttpRequestA;
use vsc\presentation\responses\HttpResponseA;
use vsc\presentation\responses\HttpResponseType;

class ProcessorMap extends MappingA {
	/**
	 *
	 * @var HttpResponseA
	 */
	private $oResponse;

	/**
	 *
	 * @var ViewHelperA[]
	 */
	private $aHelpers = array();

	/**
	 * @var int
	 */
	private $iHttpStatus;

	/**
	 * @param HttpResponseA $oResponse
	 */
	public function setResponse (HttpResponseA $oResponse) {
		$this->oResponse = $oResponse;
	}

	/**
	 * @returns HttpResponseA
	 */
	public function getResponse () {
		return $this->oResponse;
	}

	/**
	 *
	 * @param string $sRegex
	 * @param string $sPath
	 * @throws ExceptionSitemap
	 * @returns ControllerMap
	 */
	public function mapController ($sRegex, $sPath = null){
		if (is_null($sPath)) {
			// if we only have one parameter, we treat it as a path
			$sPath = $sRegex;
			$sRegex = $this->getRegex();
		}
		return parent::mapController($sRegex, $sPath);
	}

	/**
	 * @param ViewHelperA $oHelper
	 * @return void
	 */
	public function registerHelper (ViewHelperA $oHelper) {
		$this->aHelpers[] = $oHelper;
	}

	/**
	 * @returns ViewHelperA[]
	 */
	public function getViewHelpers () {
		return $this->aHelpers;
	}

	/**
	 * @param int $iStatus
	 */
	public function setResponseStatus ($iStatus) {
		if (HttpResponseType::isValidStatus($iStatus)) {
			$this->iHttpStatus = $iStatus;
		}
	}

	/**
	 * @return int
	 */
	public function getResponseStatus () {
		return $this->iHttpStatus;
	}
}
