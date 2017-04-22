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
 * Zamoroka_Issuu_Model_Resource_Issuu
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Model_Resource_Issuu extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Init class
     */
    protected function _construct()
    {
        $this->_init('zamoroka_issuu/issuu', 'id');
    }
}
