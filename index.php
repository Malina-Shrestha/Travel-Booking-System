<?php
    define("BASEDIR", __DIR__);

    include_once BASEDIR."/vendor/autoload.php";
    $user = new \App\Models\User();

    $users = $user->select('name, address')->offset( 1)->limit(1)->where('name', 'ram')->orWhere('address', '!=')->order('age','DESC')->get();

    foreach ($users as $item){
        echo "NAme: {$users->name}<br>Adresss: {$users->address}";
    }


    dump($users);


