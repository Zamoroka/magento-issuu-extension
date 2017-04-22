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
 * Zamoroka_Issuu_Block_Adminhtml_Issuu_Edit_Tab_General
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Block_Adminhtml_Issuu_Edit_Tab_General extends Zamoroka_Issuu_Block_Adminhtml_Issuu_Edit_Tab_Abstract
{
    /**
     * Prepare form before rendering HTML
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $data = $this->_getCurrentData();
        $data ? $isActive = $data['is_active'] : $isActive = 1;
        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('general');
        $fieldset = $form->addFieldset('issuu_general_form', array(
            'legend' => $this->__('General Setup')
        ));

        $fieldset->addField('need_update', 'hidden', array(
            'label' => $this->__('Update'),
            'name' => 'need_update',
            'title' => 'need_update',
            'required' => false,
        ));

        $fieldset->addField('category_id', 'select', array(
            'label' => $this->__('Enable post?'),
            'name' => 'is_active',
            'values' => array(
                array('value' => 1, 'label' => $this->__('Yes')),
                array('value' => 0, 'label' => $this->__('No'))
            ),
            'value' => array($isActive),
            'disabled' => false
        ));

        $fieldset->addField('url', 'text', array(
            'name' => 'url',
            'label' => $this->__('Url'),
            'title' => $this->__('Url'),
            'class' => 'required-entry',
            'required' => true,
        ));
        $dateTimeFormat = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $fieldset->addField('date_start', 'datetime', array(
            'label' => $this->__('Start publishing on'),
            'title' => $this->__('Start publishing on'),
            'time' => true,
            'name' => 'date_start',
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'format' => $dateTimeFormat,
            'required' => true,
        ));

        if ($data) {
            $form->addValues($data);
        }
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
