<?php
namespace App\Controllers;


use App\Models\Admin;
use System\Core\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        view('/back/login/index');
    }

    public function check()
    {
        extract($_POST);

        $password = sha1($password);

        $admin = new Admin;
        $login = $admin->where('email', $email)
                       ->where('password', $password)
                       ->get();
        dd($login);
    }
//    public function __construct()
//    {
//        if(!$this->checkLogin('admin')) {
//            redirect(url('/login'));
//        }
//    }

}