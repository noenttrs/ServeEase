<?php
session_start();

require '../src/config/Config.php';
require '../vendor/autoload.php';

//Route appelée pour arriver à la Home page
$router = new ServeEase\Router($_SERVER["REQUEST_URI"]);



$router->get('/', "MainController@showMain");

// Signup
$router->get('/signup', "ClientController@showSignup");
$router->post('/signup', "ClientController@signup");

// Signing 
$router->get('/signin', "ClientController@showSignin");
$router->post('/signin', "ClientController@signin");

//  Logout
$router->get('/logout', "ClientController@logout");

// Admin
$router->get('/admin', "AdminController@showAdmin");

$router->run();
