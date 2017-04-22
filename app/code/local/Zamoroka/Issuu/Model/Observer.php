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
 * Zamoroka_Issuu_Model_Observer
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Model_Observer extends Mage_Core_Model_Abstract
{
    /** @var Zamoroka_Issuu_Helper_Data $helper */
    protected $helper = false;

    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->helper = Mage::helper('zamoroka_issuu');
    }

    /**
     * Adding issuu link to main menu
     *
     * @param Varien_Event_Observer $observer
     */
    public function addToTopmenu(Varien_Event_Observer $observer)
    {
        /** @var Varien_Data_Tree_Node $menu */
        $menu = $observer->getMenu();
        $tree = $menu->getTree();
        $node = new Varien_Data_Tree_Node(array(
            'name' => 'Issuu',
            'id' => 'issuu',
            'url' => $this->helper->getIssuuUrl(),
        ), 'id', $tree, $menu);

        $menu->addChild($node);
    }
}
