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
 * Zamoroka_Issuu_Block_Adminhtml_Issuu_Edit_Tab_Publishing
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Block_Adminhtml_Issuu_Edit_Tab_Data extends Zamoroka_Issuu_Block_Adminhtml_Issuu_Edit_Tab_Abstract
{
    /**
     * Prepare form before rendering HTML
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $data = $this->_getCurrentData();
        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('publishing_');
        $fieldset = $form->addFieldset('issuu_publishing_form', array(
            'legend' => $this->__('Publishing Data')
        ));
        $fieldset->addField('title', 'text', array(
            'name' => 'title',
            'label' => $this->__('Title'),
            'title' => $this->__('Title'),
            'required' => false,
        ));
        $fieldset->addField('description', 'editor', array(
            'name' => 'description',
            'label' => $this->__('Description'),
            'title' => $this->__('Description'),
            'required' => false,
        ));
        $fieldset->addField('content', 'editor', array(
            'name' => 'content',
            'label' => $this->__('Content'),
            'title' => $this->__('Content'),
            'required' => false,
        ));
        $fieldset->addField('thumbnail_url', 'text', array(
            'name' => 'thumbnail_url',
            'label' => $this->__('Thumbnail url'),
            'title' => $this->__('Thumbnail url'),
            'required' => false,
        ));
        $fieldset->addField('author_name', 'text', array(
            'name' => 'author_name',
            'label' => $this->__('Author name'),
            'title' => $this->__('Author name'),
            'required' => false,
        ));
        $fieldset->addField('author_url', 'text', array(
            'name' => 'author_url',
            'label' => $this->__('Author url'),
            'title' => $this->__('Author url'),
            'required' => false,
        ));
        if ($data) {
            $form->addValues($data);
        }
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
