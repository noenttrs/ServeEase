<?php
session_start();

require '../src/config/Config.php';
require '../vendor/autoload.php';

//Route appelée pour arriver à la Home page
$router = new ServeEase\Router($_SERVER["REQUEST_URI"]);



$router->get('/', "MainController@showMain");
$router->get('/signup', "ClientController@showSignup");
$router->get('/logout', "ClientController@logout");



$router->post('/signup', "ClientController@signup");

$router->run();
