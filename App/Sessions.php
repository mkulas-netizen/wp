<?php


namespace App\Sessions;

/**
 * Class Sessions
 * @package App\Sessions
 */
class Sessions
{
    /**
     * @param $name
     * @param $value
     */
    public function createSession($name,$value){
        if( !session_id() ) session_name('wp'); @session_start();
        $_SESSION[$name] = $value;
    }



}