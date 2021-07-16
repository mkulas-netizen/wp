<?php

/**
 * Control exist session
 */
if (!session_id()) session_name('wp');
@session_start();

/**
 * require function and class
 */
require_once 'Function/FunctionGeneral.php';
require_once 'App/wpConnect.php';
require_once 'App/Sessions.php';


/**
 * Template html header for all page
 */
require_once 'Templates/Header.php';


/**
 * Rout request method
 */
$routes = [
    '/' => [
        'GET' => 'Pages/User/UserAuth.php',
        'POST' => 'Pages/User/UserData.php'
    ],

    /**
     * ZONE | GET
     */
    '/allZone' => [
        'GET' => 'Pages/Zone/ListAllZone.php',
    ],

    '/getZone' => [
        'GET' => 'Pages/Zone/GetZone.php',
    ],

    /**
     * RECORD => [ GET , POST , DELETE , PUT ]
     */
    '/records' => [
        'GET' => 'Pages/Record/ListRecords.php',
    ],

    '/record' => [
        'GET' => 'Pages/Record/GetRecord.php',
        'POST' => 'Pages/Record/StoreRecord.php'
    ],


    '/recordUpdate' => [
        'POST' => 'Pages/Record/UpdateRecord.php'
    ],

    '/recordsDelete' => [
        'POST' => 'Pages/Record/DeleteRecord.php'
    ]
];

/**
 * get segment parameter in url
 */
$page = segment(1);

/**
 * Request method => | POST | GET
 */
$method = $_SERVER['REQUEST_METHOD'];

/**
 * Show 404
 */
if (!isset($routes["/$page"][$method])) {
    show_404();
}


require $routes["/$page"][$method];


/**
 * Template footer for all page
 */
require_once 'Templates/Footer.php';
