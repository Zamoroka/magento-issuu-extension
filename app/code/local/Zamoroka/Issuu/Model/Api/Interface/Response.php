<?php

/**
 * Created by PhpStorm.
 * User: zamoroka
 * Date: 22.04.2017
 * Time: 0:18
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