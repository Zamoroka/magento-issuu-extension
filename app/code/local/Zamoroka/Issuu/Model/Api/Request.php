<?php

/**
 * Created by PhpStorm.
 * User: zamoroka
 * Date: 22.04.2017
 * Time: 17:50
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