<?php
session_start();

require '../src/config/Config.php';
require '../vendor/autoload.php';

//Route appelée pour arriver à la Home page
$router = new ServeEase\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "MainController@showMain");
$router->get('/signup', "gateway\SignupController@showSignup");

$router->run();
