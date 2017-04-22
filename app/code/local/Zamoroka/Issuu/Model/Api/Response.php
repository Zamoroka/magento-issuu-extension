<?php

/**
 * Created by PhpStorm.
 * User: zamoroka
 * Date: 22.04.2017
 * Time: 17:50
 */
class Zamoroka_Issuu_Model_Api_Response implements Zamoroka_Issuu_Model_Api_Interface_Response
{
    protected $_data = null;
    protected $_title = null;
    protected $_description = null;
    protected $_url = null;
    protected $_authorName = null;
    protected $_authorUrl = null;
    protected $_html = null;
    protected $_thumbnailUrl = null;
    protected $_thumbnailWidth = null;
    protected $_thumbnailHeight = null;


    /**
     * Sets all data
     *
     * @param $data stdClass
     */
    public function setData($data)
    {
        $this->_data = $data;
        $this->_title = $data->title;
        $this->_description = $data->description;
        $this->_url = $data->url;
        $this->_authorName = $data->author_name;
        $this->_authorUrl = $data->author_url;
        $this->_html = $data->html;
        $this->_thumbnailUrl = $data->thumbnail_url;
        $this->_thumbnailWidth = $data->thumbnail_width;
        $this->_thumbnailHeight = $data->thumbnail_height;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @return string
     */
    public function getAuthorName()
    {
        return $this->_authorName;
    }

    /**
     * @return string
     */
    public function getAuthorUrl()
    {
        return $this->_authorUrl;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->_html;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl()
    {
        return $this->_thumbnailUrl;
    }

    /**
     * @return int
     */
    public function getThumbnailWidth()
    {
        return $this->_thumbnailWidth;
    }

    /**
     * @return int
     */
    public function getThumbnailHeight()
    {
        return $this->_thumbnailHeight;
    }
}