<?php

if (!session_id()) session_name('wp');
@session_start();
require_once 'Templates/Header.php';
require_once 'Function/FunctionGeneral.php';
require_once 'App/wpConnect.php';
require_once 'App/Sessions.php';

$routes = [
    '/' => [
        'GET' => 'Pages/User/UserAuth.php',
        'POST' => 'Pages/User/UserData.php'
    ],

    // ZONE
    '/allZone' => [
        'GET' => 'Pages/Zone/ListAllZone.php',
    ],

    '/getZone' => [
        'GET' => 'Pages/Zone/GetZone.php',
    ],

    // RECORDS
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

$page = segment(1);
$method = $_SERVER['REQUEST_METHOD'];

if (!isset($routes["/$page"][$method])) {
    show_404();
}

require $routes["/$page"][$method];

require_once 'Templates/Footer.php';
