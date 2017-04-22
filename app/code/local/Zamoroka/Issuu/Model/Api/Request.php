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
 * Zamoroka_Issuu_Model_Api_Request
 *
 * @category Issuu
 * @package  Zamoroka
 * @author   Zamoroka Pavlo
 */
class Zamoroka_Issuu_Model_Api_Request implements Zamoroka_Issuu_Model_Api_Interface_Request
{
    private $apiHost = 'https://issuu.com/oembed';

    private $url = false;

    /**
     * @param $url string
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function prepareUrl()
    {
        return sprintf("%s?%s", $this->apiHost, http_build_query(array(
            'url' => $this->url,
            'format' => 'json'
        )));
    }

    /**
     * Makes API request
     *
     * @return stdClass
     */
    public function call()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $this->prepareUrl());
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result);

        return $obj;
    }
}