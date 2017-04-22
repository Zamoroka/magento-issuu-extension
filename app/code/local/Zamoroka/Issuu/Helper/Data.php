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
 * Zamoroka_Issuu_Helper_Data
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Returns collection of active issuu
     *
     * @return Zamoroka_Issuu_Model_Resource_Issuu_Collection
     */
    public function getIssuu()
    {
        /** @var Zamoroka_Issuu_Model_Issuu $collectionModel */
        $collectionModel = Mage::getModel('zamoroka_issuu/issuu');
        $collection = $collectionModel->getCollection();
        $collection->addFilter('is_active', 1);

        return $collection;
    }

    /**
     * Returns url of issuu issuu
     *
     * @return string
     */
    public function getIssuuUrl()
    {
        return Mage::getUrl('issuu');
    }

    /**
     * Returns url of issuu issuu
     *
     * @param int $id Id of issuu
     * @return string
     */
    public function getIssuuViewUrl($id)
    {
        return Mage::getUrl('issuu/index/view/id/' . $id);
    }

    /**
     * Returns object of issuu item
     *
     * @param int $id Id of issuu
     * @return Varien_Object
     */
    public function getIssuuItem($id)
    {
        /** @var Zamoroka_Issuu_Model_Resource_Issuu_Collection $collection */
        $collection = Mage::getModel('zamoroka_issuu/issuu')->getCollection();
        $collection->addFilter('id', $id)
            ->addFilter('is_active', 1)
            ->setPageSize(1);

        return $collection->getFirstItem();
    }

    /**
     * Returns exstention status
     *
     * @return bool
     */
    public function isExtensionEnabled()
    {
        return Mage::getStoreConfigFlag('zamoroka_issuu/issuu_general_group/enable_extension');
    }

    /**
     * Returns exstention status
     *
     * @return bool
     */
    public function isLastIssuuBlockEnabled()
    {
        return Mage::getStoreConfigFlag('zamoroka_issuu/issuu_general_group/show_last_block');
    }

    /**
     * Returns config value for limit issuu in last issuu block
     *
     * @return int
     */
    public function getIssuuInBlockConfig()
    {
        $issuuInBlock = intval(Mage::getStoreConfig('zamoroka_issuu/issuu_general_group/issuu_in_block'));
        if (!$issuuInBlock) {
            $issuuInBlock = intval(
                Mage::getConfig()->loadModulesConfiguration('config.xml')->getNode('default/zamoroka_issuu/issuu_general_group/issuu_in_block')
            );
        }

        return $issuuInBlock;
    }

    /**
     * Returns config value for limit issuu per page in issuu block
     *
     * @return int
     */
    public function getIssuuPerPageConfig()
    {
        $issuuPerPage = intval(Mage::getStoreConfig('zamoroka_issuu/issuu_general_group/issuu_per_page'));
        if (!$issuuPerPage) {
            $issuuPerPage = intval(
                Mage::getConfig()->loadModulesConfiguration('config.xml')->getNode('default/zamoroka_issuu/issuu_general_group/issuu_per_page')
            );
        }

        return $issuuPerPage;
    }
}
