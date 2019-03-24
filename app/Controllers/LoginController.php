<?php
/**
 * Created by PhpStorm.
 * User: malina
 * Date: 3/22/19
 * Time: 12:58 PM
 */

namespace App\Controllers;


use System\Core\BaseController;

class LoginController extends BaseController
{
    public function __construct()
    {
        if(!$this->checkLogin('admin')) {
            redirect(url('/login'));
        }
    }

}