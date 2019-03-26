<?php
/**
 * Created by PhpStorm.
 * User: malina
 * Date: 3/26/19
 * Time: 12:21 PM
 */

namespace App\Controllers;


use App\Models\Admin;
use System\Core\BaseController;

class AdminsController extends BaseController
{
    public function index()
    {
        $admin = new Admin;
        $admins = $admin->get();
        view('back/users/index', compact('admins'));
    }

}