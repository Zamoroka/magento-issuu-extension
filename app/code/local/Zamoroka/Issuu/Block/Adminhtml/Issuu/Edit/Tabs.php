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
 * Zamoroka_Issuu_Block_Adminhtml_Issuu_Edit_Tabs
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Block_Adminhtml_Issuu_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * Initialize class
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('issuu_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle($this->__('Information'));
    }

    /**
     * Preparing global layout
     */
    protected function _prepareLayout()
    {
        $this->addTab('item_general', array(
            'label' => $this->__('General'),
            'content' => $this->getLayout()
                ->createBlock('zamoroka_issuu/adminhtml_issuu_edit_tab_general')
                ->toHtml()
        ));
        $this->addTab('item_publishing', array(
            'label' => $this->__('Data'),
            'content' => $this->getLayout()
                ->createBlock('zamoroka_issuu/adminhtml_issuu_edit_tab_data')
                ->toHtml()
        ));
    }
}
