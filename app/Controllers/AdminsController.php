<?php
namespace App\Controllers;


use App\Models\Admin;
use System\Core\BaseController;

class AdminsController extends BaseController
{
    public function index()
    {
        $admin = new Admin;
        $admins = $admin->get();

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
//                        ->$limit($limit)
//                        ->get();

        view('back/admins/index', compact('admins'));
    }

    public function create() {
        view('back/admins/create');
    }

    public function store()
    {
        extract($_POST);

        $password = sha1($password);

        $admin = new Admin;
        $admin->name = $name;
        $admin->email = $email;
        $admin->phone = $phone;
        $admin->address = $address;
        $admin->password = $password;
        $admin->created_at = date('Y-m-d H:i:s');
        $admin->updated_at = date('Y-m-d H:i:s');
        $admin->save();

        $_SESSION['message'] = [
            'content' => 'Admin added',
            'type' => 'success'
        ];

        redirect(url('/admins'));
    }

    public function edit($id)
    {
        $admin = new Admin;
        $admin->load($id);

        view('back/admins/edit', compact('admin'));
    }

    public function update($id)
    {
        extract($_POST);

        $admin = new Admin;
        $admin->load($id);
        $admin->name = $name;
        $admin->phone = $phone;
        $admin->address = $address;
        $admin->password = $password;
        $admin->updated_at = date('Y-m-d H:i:s');
        $admin->save();

        $_SESSION['message'] = [
            'content' => 'Admin added',
            'type' => 'success'
        ];

        redirect(url('/admins'));
    }

    public function delete($id)
    {
        $admin = new Admin;
        $admin->load($id);
        $admin->delete();

        $_SESSION['message'] = [
            'content' => 'Admin removed.',
            'type' => 'success'
        ];

        redirect(url('/admins'));
    }


}

