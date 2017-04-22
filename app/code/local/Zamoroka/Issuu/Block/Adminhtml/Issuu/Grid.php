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
 * @category  Test
 * @package   MyNamespace
 * @copyright Copyright (c) 2017 Zamoroka Pavlo (http://www.zamoroka.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Zamoroka_Issuu_Block_Adminhtml_Issuu_Grid
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Block_Adminhtml_Issuu_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Init class
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('issuuGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /**
     * Prepare collection
     */
    protected function _prepareCollection()
    {
        /** @var Zamoroka_Issuu_Model_Resource_Issuu_Collection $collection */
        $collection = Mage::getModel('zamoroka_issuu/issuu')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare form before rendering HTML
     */
    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header' => $this->__('ID'),
            'align' => 'right',
            'width' => '10px',
            'index' => 'id',
        ));
        $this->addColumn('title', array(
            'header' => $this->__('Title'),
            'align' => 'left',
            'index' => 'title',
            'width' => '600px',
        ));
        $this->addColumn('is_active', array(
            'header' => $this->__('Active'),
            'width' => '200px',
            'index' => 'is_active',
        ));
        $this->addColumn('date_start', array(
            'header' => $this->__('Created'),
            'width' => '200px',
            'index' => 'date_start',
        ));
        $this->addColumn('action', array(
            'header' => $this->__('Action'),
            'width' => '50px',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => $this->__('Edit'),
                    'url' => array('base' => '*/*/edit'),
                    'field' => 'id',
                )
            ),
            'filter' => false,
            'sortable' => false
        ));

        return parent::_prepareColumns();
    }

    /**
     * Return URL on rows click
     *
     * $return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    /**
     * Return Grid URL for AJAX
     *
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }
}
