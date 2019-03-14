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

        if(key_exists($key, $config)) {
            return $config[$key];
        }
        else {
            return false;
        }
    }
}