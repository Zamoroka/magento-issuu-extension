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
 * Zamoroka_Issuu_Model_Api_Interface_Response
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
interface Zamoroka_Issuu_Model_Api_Interface_Response
{
    /**
     * @param $data
     * @return void
     */
    public function setData($data);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return string
     */
    public function getAuthorName();

    /**
     * @return string
     */
    public function getAuthorUrl();

    /**
     * @return string
     */
    public function getHtml();

    /**
     * @return string
     */
    public function getThumbnailUrl();

    /**
     * @return int
     */
    public function getThumbnailWidth();

    /**
     * @return int
     */
    public function getThumbnailHeight();
}