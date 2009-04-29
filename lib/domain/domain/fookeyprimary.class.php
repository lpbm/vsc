<?php
/**
 * @package ts_models
 * @author Marius Orcsik <marius@habarnam.ro>
 * @date 09.04.27
 */

class fooKeyPrimary extends fooIndexA  {
	public function __construct ($mIncomingStuff) {
		/* @var $oField fooFieldA */
		foreach ($mIncomingStuff as $oField) {
			// enforcing NOT NULL constraints on the components of the primary key
			if (fooFieldA::isValid($oField)) {
				$oField->setIsNullable(false);
				$aRet[] = $oField;
			} else {
				throw new fooIndexException('The object passed can not be used as a primary key.');
			}
		}
		parent::__construct($aRet);
	}

	public function getName () {
		return $this->name;
	}

	public function setName ($sName) {
		$this->name = $sName . '_pk';
	}

	public function getType() {
		return 'PRIMARY';
	}
}