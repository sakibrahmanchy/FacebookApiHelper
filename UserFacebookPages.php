<?php
/**
 * Created by PhpStorm.
 * User: Sakib Rahman
 * Date: 6/12/2017
 * Time: 2:26 AM
 */

class UserFacebookPages {

    public $pageId;
    public $pageName;
    public $pageAccessToken;


    function __construct($pageName, $pageId)
    {
        $this->pageName = $pageName;
        $this->pageId = $pageId;
    }

    /**
     * @return mixed
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * @param mixed $pageId
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;
    }

    /**
     * @return mixed
     */
    public function getPageName()
    {
        return $this->pageName;
    }

    /**
     * @param mixed $pageName
     */
    public function setPageName($pageName)
    {
        $this->pageName = $pageName;
    }

    /**
     * @return mixed
     */
    public function getPageAccessToken()
    {
        return $this->pageAccessToken;
    }

    /**
     * @param mixed $pageAccessToken
     */
    public function setPageAccessToken($pageAccessToken)
    {
        $this->pageAccessToken = $pageAccessToken;
    }





}