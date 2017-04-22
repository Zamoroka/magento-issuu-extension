<?php

/**
 * Created by PhpStorm.
 * User: zamoroka
 * Date: 22.04.2017
 * Time: 0:26
 */
interface Zamoroka_Issuu_Model_Api_Interface_Request
{
    /**
     * @param $url string
     * @return void
     */
    public function setUrl($url);

    /**
     * Makes API request
     *
     * @return Zamoroka_Issuu_Model_Api_Interface_Response
     */
    public function call();
}