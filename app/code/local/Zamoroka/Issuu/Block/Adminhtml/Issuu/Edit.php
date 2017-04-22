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
 * Zamoroka_Issuu_Block_Adminhtml_Issuu_Edit
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Block_Adminhtml_Issuu_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Init class
     */
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'zamoroka_issuu';
        $this->_controller = 'adminhtml_issuu';
        $this->_mode = 'edit';
    }

    /**
     * Prepare layout
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->_updateButton('save', 'label', $this->__('Save publication'));
        $this->_updateButton('delete', 'label', $this->__('Delete publication'));
        $this->_addButton('save_and_continue', array(
            'label' => $this->__('Save and continue edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save'
        ), 10);
        $this->_addButton('update_data', array(
            'label' => $this->__('Update data'),
            'onclick' => 'updateData()',
        ), 50);

        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
        $this->_formScripts[]
            = "function saveAndContinueEdit(){
                editForm.submit($('edit_form').action + 'back/edit/');
            }";
        $this->_formScripts[]
            = "function updateData(){
                document.getElementById('generalneed_update').value = '1';
                editForm.submit($('edit_form').action + 'back/edit/');
            }";
    }

    /**
     * Get Header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        /** @var Zamoroka_Issuu_Model_Issuu $model */
        $model = Mage::registry('current_issuu');
        if ($model && $model->getID()) {
            return $this->__('Edit post "%s" (ID: %s)', $this->htmlEscape($model->getTitle()), $this->htmlEscape($model->getId()));
        } else {
            return $this->__('New post');
        }
    }
}
