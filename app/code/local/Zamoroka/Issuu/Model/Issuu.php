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
 * Zamoroka_Issuu_Model_Issuu
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Model_Issuu extends Mage_Core_Model_Abstract
{
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'zamoroka_issuu';

    /**
     * Init class
     */
    protected function _construct()
    {
        $this->_init('zamoroka_issuu/issuu');
    }

    /**
     * Processing object before save data
     *
     * @return Mage_Core_Model_Abstract
     */
    protected function _beforeSave()
    {
        if (!$this->getId()) {
            $this->isObjectNew(true);
        }

        if ($this->isObjectNew() || $this->getNeedUpdate()) {
            $this->_updateData();
        }

        Mage::dispatchEvent('model_save_before', array('object' => $this));
        Mage::dispatchEvent($this->_eventPrefix . '_save_before', $this->_getEventData());
        return $this;
    }

    /**
     * Updating data from issuu.com
     *
     * @return $this
     */
    protected function _updateData()
    {
        /** @var Zamoroka_Issuu_Helper_Data $helper */
        $helper = Mage::helper('zamoroka_issuu');

        if ($this->getUrl() && $response = $helper->makeRequest($this->getUrl())) {
            $this->setTitle($response->getTitle());
            $this->setDescription($response->getDescription());
            $this->setContent($response->getHtml());
            $this->setThumbnailUrl($response->getThumbnailUrl());
            $this->setAuthorName($response->getAuthorName());
            $this->setAuthorUrl($response->getAuthorUrl());
        }

        return $this;
    }
}
