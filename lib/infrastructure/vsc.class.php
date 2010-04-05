<?php
/**
 * @package vsc_infrastructure
 * @author marius orcsik <marius@habarnam.ro>
 * @date 09.08.31
 */
class vsc extends vscObject {
    static private $oInstance;
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
		import ('presentation/requests');
		if (!(self::$oRequest instanceof vscHttpRequestA)){
			self::$oRequest = new vscRwHttpRequest();
		}

		return self::$oRequest;
	}

	/**
	 * @return vscHttpDispatcherA
	 */
	static public function getDispatcher () {
		import ('application/dispatchers');
		if (!(self::$oDispatcher instanceof vscDispatcherA)){
			self::$oDispatcher = new vscRwDispatcher();
		}
		return self::$oDispatcher;
	}

	static public function getEnv () {
        if (!(self::$oInstance instanceof self)) {
            self::$oInstance = new self();
        }
		return self::$oInstance;
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

	static public function name() {
		return 'V<sup>S<sup>C</sup></sup>';
	}

	/**
	 * returns an end of line, based on the environment
	 * @return string
	 */
	static public function nl () {
		return isCli() ? "\n" : '<br/>' . "\n";
	}

}
