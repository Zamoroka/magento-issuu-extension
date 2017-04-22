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
 * Zamoroka_Issuu_Block_Issuu
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Block_View extends Mage_Core_Block_Template
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
     * Issuu Block
     *
     * @return Zamoroka_Issuu_Model_Issuu
     */
    public function getIssuuItem()
    {
        $id = $this->getRequest()->getParam('id');

        return $this->helper->getIssuuItem($id);
    }
}
