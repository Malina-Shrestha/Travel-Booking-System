<?php
namespace App\Controllers;


use App\Models\Package;
use System\Core\BaseController;

class PackageController extends BaseController
{
    public function __call($name, $arguments)
    {
        $this->show($name);
    }

    public function index()
    {
        header('HTTP/1.1 404 Not Found');
    }

    public function show($id)
    {
        $package = new Package;
        $package->load($id);

        view('front/package/show', compact('package'));
    }

}