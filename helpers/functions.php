<?php
if(!function_exists('config')) {
    /**
     * Get specified configuration value.
     *
     * @param string $key
     * @return bool|string
     */
    function config($key) {
        include BASEDIR.'/config/settings.php';
        dump($config);
        if(key_exists($key, $config)) {
            return $config[$key];
        }
        else {
            return false;
        }
    }
}

if(!function_exists('url')){
    function url($uri = '') {
        $base_url = config('base_url');
        return $base_url.$uri;
    }
}

if(!function_exists('redirect')) {
    function redirect($url) {
        header('location:'.$url);
    }
}

if(!function_exists('view')){
    function view($view_file = null, $data = []) {
        return new \System\Core\View($view_file, $data);
    }
}