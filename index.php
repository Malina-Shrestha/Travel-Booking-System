<?php

    define("BASEDIR", __DIR__);

    include_once BASEDIR."/vendor/autoload.php";
    $user = new \App\Models\User();

//    $users = $user->select('name, address')->offset( 1)->limit(1)->where('name', 'ram')->orWhere('address', '!=')->single();
//    $users = $user->select('name, address')->order('age', 'DESC')->get();
//    foreach ($users as $item){
//      echo "NAme: {$item->name}<br>Adresss: {$item->address}";
//    }
//
   $user->load(1);
   dump($user);


//    $app = new \System\Core\Initialize;
//    $app->start();
////
//    echo date_default_timezone_get();

//    define("BASEDIR", __DIR__);
//
//    include_once BASEDIR."/vendor/autoload.php";
//
//   $user = new \App\Models\User();
//
//    $users = $user->select(' name, address')->offset(1)->limit(1)->where('name', 'ram')->orWhere('address', 'kalimati', ' !=')->get();

//    $users = $user->select('name, address')->get();
//    dump($users);
