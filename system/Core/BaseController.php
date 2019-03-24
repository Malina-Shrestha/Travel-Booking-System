<?php


namespace System\Core;


abstract class BaseController
{
    abstract public function index();

    public function checkLogin($type)
    {
        return !empty($_SESSION[$type]);


    }

}