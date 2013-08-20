<?php
import ('domain');
import ('models');
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-08-16 at 10:16:48.
 */
class vscEmptyModelTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var vscEmptyModel
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new vscEmptyModel;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	/**
	 * @covers vscEmptyModel::setPageTitle
	 * @todo   Implement testSetPageTitle().
	 */
	public function testSetGetPageTitle()
	{
		$sTitle = 'test title';
		$this->object->setPageTitle($sTitle);
		
		$this->assertEquals($this->object->getPageTitle(), $sTitle);
	}

	/**
	 * @covers vscEmptyModel::setPageContent
	 * @todo   Implement testSetPageContent().
	 */
	public function testSetGetPageContent()
	{
		$sContent = 'test content <p>some shit</p>';
		$this->object->setPageContent($sContent);
		
		$this->assertEquals($this->object->getPageContent(), $sContent);
	}
}
