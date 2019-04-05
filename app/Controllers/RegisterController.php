<?php
/**
 * Created by PhpStorm.
 * User: malina
 * Date: 4/5/19
 * Time: 12:24 PM
 */

namespace App\Controllers;


use System\Core\BaseController;

class RegisterController extends BaseController
{
    public function index()
    {
        view('/front/register/index');
    }
}