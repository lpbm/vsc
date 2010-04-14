<?php
/**
 * @package vsc_domain
 * @subpackage domain
 * @author marius orcsik <marius@habarnam.ro>
 * @date 10.04.14
 */
class vscRssItem extends vscModelA {
	public $title;
	public $link;
	public $description;
	public $pubDate;
	public $guid;

	public function __construct (DOMNode $oNode) {
		$this->buildObj ($oNode);
	}

	public function buildObj (DOMNode $oNode) {
		if ( $oNode->nodeName == 'item' && $oNode->childNodes instanceof DOMNodeList) {
			foreach ($oNode->childNodes as $oChildNode) {
				$sName = $oChildNode->nodeName;
				if (
					$oChildNode->nodeType == XML_ELEMENT_NODE &&
					$this->valid ($sName)
				) {
					try {
						$this->$sName = $oChildNode->nodeValue;
					} catch (vscExceptionUnimplemented $e) {
						// problem
					}
				} else {
					continue;
				}
			}
		}
	}
}