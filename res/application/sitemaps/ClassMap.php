<?php
/**
 * @package vsc\application\sitemaps
 * @author marius orcisk <marius@habarnam.ro>
 * @date 2014.08.07
 */
namespace vsc\application\sitemaps;


use vsc\application\processors\ProcessorA;
use vsc\ExceptionPath;
use vsc\presentation\helpers\ViewHelperA;
use vsc\presentation\responses\HttpResponseA;
use vsc\presentation\views\ViewA;

class ClassMap extends MappingA {
	private $sMainTemplatePath;
	private $sMainTemplate;

	private $sViewPath;
	private $oView;
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

	public function setMainTemplatePath ($sPath) {
		$this->sMainTemplatePath = realpath($sPath);
		if ( !is_dir($this->sMainTemplatePath) ) {
			$this->sMainTemplatePath = null;
			throw new ExceptionPath (sprintf('Path [%s] does not exist', $sPath));
		}
	}

	public function getMainTemplatePath () {
		// if we didn't provide the controller with a main template path we check the module
		if ( is_null($this->sMainTemplatePath)) {
			if ( $this->getModuleMap() instanceof ContentTypeMappingI) {
				$this->sMainTemplatePath = $this->getModuleMap()->getMainTemplatePath();
			}
		}

		if ( is_null($this->sMainTemplatePath)) {
			// back-up
			$this->sMainTemplatePath = VSC_RES_PATH . 'templates';
		}
		return $this->sMainTemplatePath;
	}

	public function setMainTemplate ($sPath) {
		$this->sMainTemplate = $sPath;
	}

	public function getMainTemplate () {
		// if we didn't provide the controller with a main template path we check the module
		if ( is_null($this->sMainTemplate ) ) {
			if ( $this->getModuleMap() instanceof ContentTypeMappingI) {
				$this->sMainTemplate = $this->getModuleMap()->getMainTemplate();
			}
		}
		if ( is_null($this->sMainTemplate)) {
			// back-up
			$this->sMainTemplate = 'main.php';
		}
		return $this->sMainTemplate;
	}

	/**
	 *
	 * To allow a single controller type to return a different type of view
	 * @param string|object $mView
	 * @throws ExceptionPath
	 */
	public function setView ($mView) {
		if (ViewA::isValid($mView)) {
			$this->oView = $mView;
		} elseif (stristr(basename($mView), '.') === false && !is_file($mView)) {
			// namespaced class name
			$this->sViewPath = $mView;
		} elseif (SiteMapA::isValidObject($mView)) {
			$this->sViewPath = $mView;
		} else {
			throw new ExceptionPath ('View path [' . $mView . '] is not valid.');
		}
	}

	public function getViewPath() {
		return $this->sViewPath;
	}

	public function getView() {
		if ( !ViewA::isValid($this->oView) && !is_null($this->sViewPath)){
			if (stristr(basename($this->sViewPath), '.') === false && !is_file($this->sViewPath)) {
				$sClassName = $this->sViewPath;
			} elseif (is_file($this->sViewPath)) {
				$sViewPath = $this->getViewPath();
				try {
					include ($sViewPath);
				} catch (\Exception $e) {
					\vsc\_e($e);
				}
				$sClassName = SiteMapA::getClassName($sViewPath);
			}
		}
		if (!empty($sClassName)) {
			$this->oView = new $sClassName();
		}
		return $this->oView;
	}
}
