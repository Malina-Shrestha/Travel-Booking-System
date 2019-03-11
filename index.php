<?php
    define("BASEDIR", __DIR__);

    include_once BASEDIR."/vendor/autoload.php";

    $user = new \App\Models\User();

    $user->select('name, address')->offset( 1)->limit(1);

    dump($user);

