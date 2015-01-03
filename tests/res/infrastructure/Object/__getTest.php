<?php
namespace tests\res\infrastructure\Object;
use vsc\infrastructure\Object;
use vsc\infrastructure\vsc;
use vsc\infrastructure\Null;
use vsc\ExceptionUnimplemented;
use vsc\Exception;

/**
 * @covers \vsc\infrastructure\Object::__get()
 */
class __get extends \PHPUnit_Framework_TestCase
{
	public function test__getDev () {
		$null = new Object_underTest___get();

		$env = new vsc_underTest___get();
		$env->setIsDevelopment(true);

		vsc::setInstance($env);

		try {
			$test = $null->__get ( uniqid('test'));
		} catch (\Exception $e) {
			$this->assertInstanceOf(ExceptionUnimplemented::class, $e);
			$this->assertInstanceOf(Exception::class, $e);
		}
		try {
			$test = $null->test;
		} catch (\Exception $e) {
			$this->assertInstanceOf(ExceptionUnimplemented::class, $e);
			$this->assertInstanceOf(Exception::class, $e);
		}
	}

	public function test__getNotDev () {
		$null = new Object_underTest___get();

		$env = new vsc_underTest___get();
		$env->setIsDevelopment(false);

		vsc::setInstance($env);

		$this->assertInstanceOf(Null::class, $null->__get( uniqid('test')));
		$this->assertInstanceOf(Null::class, $null->test);
	}
}

class Object_underTest___get extends Object {}

class vsc_underTest___get extends vsc {
	private $isDevelopmentEnviroment = false;
	private $isCli = false;

	public function setIsDevelopment ($isDevelopment) {
		$this->isDevelopmentEnviroment = $isDevelopment;
	}

	/**
	 * @return boolean
	 */
	public function isDevelopment () {
		return $this->isDevelopmentEnviroment;
	}

	public function setIsCli ($IsIt) {
		$this->isCli = $IsIt;
	}

	protected function _isCli () {
		return $this->isCli;
	}
}
