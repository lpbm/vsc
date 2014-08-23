<?php
/**
 * @package presentation/requests
 * @author marius orcsik <marius@habarnam.ro>
 * @date 2013.10.04
 */
namespace vsc\rest\presentation\requests;

use vsc\presentation\requests\RawHttpRequest;

class RESTRequest extends RawHttpRequest {

	static private $validContentTypes = array(
		'application/json'
	);

	public function hasVar($sVarName) {
		return (
			$this->hasRawVar($sVarName) ||
			parent::hasVar($sVarName)
		);
	}

	public function hasRawVar ($sVarName) {
		return array_key_exists($sVarName, $this->getRawVars());
	}

	public function getRawVar ($sVarName) {
		$aRawVars = $this->getRawVars();
		if ($this->hasRawVar($sVarName)) {
			return self::getDecodedVar($aRawVars[$sVarName]);
		}
		return null;
	}

	static public function validContentType ($sContentType) {
		return in_array($sContentType, self::$validContentTypes);
	}
}
