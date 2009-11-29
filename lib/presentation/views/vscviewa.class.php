<?php
/**
 * @package vsc_presentation
 * @subpackage views
 * @author marius orcsik <marius@habarnam.ro>
 * @date 09.08.30
 */
abstract class vscViewA implements vscViewI {
	private $sTitle;
	private $oModel;
	private $sMainTemplate;

	public function getTitle () {
		return $this->sTitle;
	}

	public function setModel (vscModelI $oModel) {
		$this->oModel = $oModel;
		if ($oModel->getTitle()) {
			$this->sTitle = $oModel->getTitle();
		}
	}

	public function __get ($sVarName) {
		return $this->getModel()->$sVarName;
	}

	public function getModel () {
		return $this->oModel;
	}

	public function setContent ($sText) {
		$this->sContent = $sText;
	}

	public function getContent () {
		return $this->oModel->getContent();
	}

	public function fetch ($includePath) {
		ob_start ();
		if (is_file ($includePath)) {
			$bIncluded = @include ($includePath);
		} else {
			ob_end_clean();
			throw new vscExceptionPackageImport ('Template ' . $includePath . ' could not be located');
			return '';
		}

		$this->sContent = ob_get_contents();
		ob_end_clean ();
		return $this->sContent;
	}

	public function getOutput () {
		return '';
	}

	public function getTemplate() {
		return $this->sMainTemplate;
	}

	public function setTemplate($sPath) {
		$this->sMainTemplate = $sPath;
	}
}
