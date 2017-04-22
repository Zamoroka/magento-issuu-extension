<?php
/**
 * Zamoroka_Issuu
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to p@zamoroka.com so we can send you a copy immediately.
 *
 * @category  Issuu
 * @package   Zamoroka
 * @copyright Copyright (c) 2017 Zamoroka Pavlo (http://www.zamoroka.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Zamoroka_Issuu_IndexController
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_IndexController extends Mage_Core_Controller_Front_Action
{
    /** @var Zamoroka_Issuu_Helper_Data $helper */
    protected $helper = false;

    /**
     * Constructor
     */
    protected function _construct()
    {
        parent::_construct();
        $this->helper = Mage::helper('zamoroka_issuu');
    }

    /**
     * Index action
     */
    public function indexAction()
    {
        if ($this->helper->isExtensionEnabled()) {
            $this->loadLayout();
            $this->getLayout()->getBlock("head")->setTitle($this->__("Issuu"));
            /** @var Mage_Page_Block_Html_Breadcrumbs $breadcrumbs */
            $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
            $breadcrumbs->addCrumb(
                "home", array(
                    "label" => $this->__("Home Page"),
                    "title" => $this->__("Home Page"),
                    "link" => Mage::getBaseUrl()
                )
            );
            $breadcrumbs->addCrumb(
                "issuu", array(
                    "label" => $this->__("Issuu"),
                    "title" => $this->__("Issuu")
                )
            );
            $this->renderLayout();
        } else {
            $this->getResponse()->setHeader('HTTP/1.1', '404 Not Found');
            $this->getResponse()->setHeader('Status', '404 File not found');
            $this->_forward('noroute');
        }
    }

    /**
     * View action
     */
    public function viewAction()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var Varien_Object $issuuItem */
        $issuuItem = $this->helper->getIssuuItem($id);
        if ($this->helper->isExtensionEnabled() && $issuuItem->getId()) {
            $this->loadLayout();
            $this->getLayout()->getBlock("head")
                ->setTitle($issuuItem->getSeoTitle())
                ->setDescription($issuuItem->getSeoDescription())
                ->setKeywords($issuuItem->getSeoKeywords());
            /** @var Mage_Page_Block_Html_Breadcrumbs $breadcrumbs */
            $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
            $breadcrumbs->addCrumb(
                "home", array(
                    "label" => $this->__("Home Page"),
                    "title" => $this->__("Home Page"),
                    "link" => Mage::getBaseUrl()
                )
            );
            $breadcrumbs->addCrumb(
                "issuu", array(
                    "label" => $this->__("Issuu"),
                    "title" => $this->__("Issuu"),
                    "link" => $this->helper->getIssuuUrl()
                )
            );
            $breadcrumbs->addCrumb(
                "title", array(
                    "label" => $issuuItem->getTitle(),
                    "title" => $issuuItem->getTitle()
                )
            );
            $this->renderLayout();
        } else {
            $this->getResponse()->setHeader('HTTP/1.1', '404 Not Found');
            $this->getResponse()->setHeader('Status', '404 File not found');
            $this->_forward('noroute');
        }
    }
}
