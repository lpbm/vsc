<?php
/**
 * @package presentation
 * @subpackage requests
 * @author marius orcsik <marius@habarnam.ro>
 * @date 21.02.15
 */
namespace vsc\presentation\requests;

trait FilesRequestT {
	protected $aFiles = array();

	/**
	 * @return bool
	 */
	public function hasFiles() {
		return (is_array($this->aFiles) && count($this->aFiles) >= 1);
	}

	/**
	 * @return array
	 */
	public function getFiles() {
		return $this->aFiles;
	}

	/**
	 * @param $sFileName
	 * @return array
	 */
	public function getFile($sFileName) {
		// @todo
	}

}
