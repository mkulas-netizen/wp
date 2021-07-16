<?php
define('BASE_URL','http://localhost/wp/');


/**
 * 404 page
 */
function show_404()
{
    header("HTTP/1.0 404 NOT FOUND");
    //include_once("");
    echo '404';
    die();
}


/**
 * @return string
 * http | https
 */
function get_http()
{
    return 'http' .
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 's://' : '://') .
        $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}


/**
 * @return false|string[]
 * segment url
 */
function get_segments()
{
    $current_url = 'http' .
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 's://' : '://') .
        $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    $path = str_replace(BASE_URL, '', $current_url);
    $path = trim(parse_url($path, PHP_URL_PATH), '/');
    $segments = explode('/', $path);

    return $segments;
}

/**
 * @param $index
 * @return false|mixed|string
 */
function segment($index)
{
    $segments = get_segments();
    return isset($segments[$index - 1]) ? $segments[$index - 1] : false;
}