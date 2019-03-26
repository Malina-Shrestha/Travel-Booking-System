<?php
/**
 * Created by PhpStorm.
 * User: malina
 * Date: 3/24/19
 * Time: 1:06 PM
 */

namespace App\Controllers;


use System\Core\BaseController;

class LogoutController extends BaseController
{
    public function index()
    {
        unset($_SESSION['admin']);
        redirect(url('/login'));

    }

}