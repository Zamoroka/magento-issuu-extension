<?php

/**
 * Created by PhpStorm.
 * User: zamoroka
 * Date: 22.04.2017
 * Time: 0:26
 */
interface RequestInterface
{
    /**
     * @param $url string
     * @return void
     */
    public function setUrl($url);

    /**
     * Makes API request
     *
     * @return ResponseInterface
     */
    public function makeRequest();
}