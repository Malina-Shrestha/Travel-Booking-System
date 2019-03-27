<?php


namespace System\Core;


abstract class BaseController
{
    abstract public function index();

    public function checkLogin($type)
    {
        return !empty($_SESSION[$type]);
    }


//    public function page()
//    {
//        $admin = new Admin;
//        $admins = $admin->get();
//
//        if(!empty($_GET['page'])) {
//            $pageno = $_GET['page'];
//        }
//        else {
//            $pageno = 1;
//        }
//
//        $limit = 2;
//
//        $pages = ceil( count($admins)/$limit);
//
//        $offset = ($pageno - 1) * $limit;
//
//        $admins = $admin->offset($offset)
//            ->$limit($limit)
//            ->get();
//
//        view('back/admins/index', compact('admins'));
//    }

}