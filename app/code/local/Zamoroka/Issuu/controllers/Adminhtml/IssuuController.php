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
 * Zamoroka_Issuu_Adminhtml_IssuuController
 *
 * @category Test
 * @package  MyNamespace
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Adminhtml_IssuuController extends Mage_Adminhtml_Controller_Action
{
    /** @var Zamoroka_Issuu_Helper_Data $helper */
    protected $helper = false;
    /** @var Zamoroka_Issuu_Model_Issuu $data */
    protected $model = false;

    /**
     * Constructor
     */
    protected function _construct()
    {
        parent::_construct();
        $this->helper = Mage::helper('zamoroka_issuu');
        $this->model = Mage::getModel('zamoroka_issuu/issuu');
    }

    /**
     * Shows index page
     */
    public function indexAction()
    {
        $this->_redirect('*/*/issuu');
    }

    /**
     * Display grid
     */
    public function issuuAction()
    {
        $this->_getSession()->setFromData(array());
        $this->_title($this->__('Issuu'));
        $this->loadLayout();
        $this->_setActiveMenu('zamoroka_issuu');
        $this->_addBreadcrumb($this->__('Issuu'), $this->__('Issuu'));
        $this->renderLayout();
    }

    /**
     * Grid action for ajax requests
     */
    public function gridAction()
    {
        $this->loadLayout()->renderLayout();
    }

    /**
     * Redirect to edit action
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Create or edit info
     */
    public function editAction()
    {
        Mage::register('current_issuu', $this->model);
        $id = $this->getRequest()->getParam('id');
        try {
            if ($id) {
                if (!$this->model->load($id)->getId()) {
                    throw new Mage_Core_Exception($this->__('No records with ID "%s" found.', $id));
                }
            }
            if ($this->model->getId()) {
                $pageTitle = $this->__('Edit %s (%s)', $this->model->getName(), $this->model->getType());
            } else {
                $pageTitle = $this->__('New info');
            }
            $this->_title($this->__('Issuu'))->_title($pageTitle);
            $this->loadLayout();
            $this->_setActiveMenu('zamoroka_issuu');
            $this->renderLayout();
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            $this->_redirect('*/*/issuu');
        }
    }

    /**
     * Process form post
     */
    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        if ($data) {
            $this->_getSession()->setFormData($data);
            $id = $this->getRequest()->getParam('id');
            try {
                if ($id) {
                    $this->model->load($id);
                }
                $this->model->addData($data);
                $this->model->save();
                $this->_getSession()->addSuccess(
                    $this->__('Info was succesfully saved')
                );
                $this->_getSession()->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $params = array(
                        'id' => $this->model->getId()
                    );
                    $this->_redirect('*/*/edit', $params);
                } else {
                    $this->_redirect('*/*/issuu');
                }
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                if ($this->model && $this->model->getId()) {
                    $params = array(
                        'id' => $this->model->getId()
                    );
                    $this->_redirect('*/*/edit', $params);
                } else {
                    $this->_redirect('*/*/issuu');
                }
            }
        }
    }

    /**
     * Delete info
     */
    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        try {
            if ($id) {
                if (!$this->model->load($id)->getId()) {
                    throw new Mage_Core_Exception($this->__('No record with ID "%s" found.', $id));
                }
                $name = $this->model->getName();
                $this->model->delete();
                $this->_getSession()->addSuccess(
                    $this->__('"%s" (ID %d) was succesfully consumed.', $name, $id)
                );
                $this->_redirect('*/*');
            }
        } catch (Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        }
    }
}
