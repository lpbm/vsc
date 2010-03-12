<?php
/**
 * @package vsc_infrastructure
 * @author marius orcsik <marius@habarnam.ro>
 * @date 09.08.31
 */
import ('application/dispatchers');
import ('presentation/requests');
class vsc {
	/**
	 * @var vscHttpRequestA
	 */
	static private $oRequest;

	/**
	 * @var vscDispatcherA
	 */
	static private $oDispatcher;

	/**
	 * @return vscHttpRequestA
	 */
	static public function getHttpRequest () {
		if (!(self::$oRequest instanceof vscHttpRequestA)){
			self::$oRequest = new vscRwHttpRequest();
		}

		return self::$oRequest;
	}

	/**
	 * @return vscHttpDispatcherA
	 */
	static public function getDispatcher () {
		if (!(self::$oDispatcher instanceof vscDispatcherA)){
			self::$oDispatcher = new vscRwDispatcher();
		}
		return self::$oDispatcher;
	}

	static public function getEnv () {
		return self;
	}

	public function isDevelopment () {
		return true;
	}

	/**
	 * @return bool
	 */
	static public function isCli () {
		return (php_sapi_name() == 'cli');
	}

	/**
	 * returns an end of line, based on the environment
	 * @return string
	 */
	static public function nl () {
		return isCli() ? "\n" : '<br/>' . "\n";
	}

}