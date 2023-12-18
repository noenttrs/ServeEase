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

// Shop
$router->get('/product', "ProductController@showProduct");
$router->get('/shop', "ProductController@showAllProduct");
$router->post('/product', "ProductController@addBasket");

// Basket
$router->get('/product', "ProductController@addBakset");
$router->get('/basket', "ProductController@showBasket");
$router->get('/basket/:productId/addOne', "ProductController@addBasket");
$router->get('/basket/:productId/minusOne', "ProductController@minusBasket");
$router->get('/basket/:productId/delete', "ProductController@delete");


// Admin
$router->get('/admin', "AdminController@showAdmin");
$router->post('/searchClient', "AdminController@searchClient");
$router->post('/updateClient', "AdminController@modifyClient");
$router->post('/createProduct', "AdminController@createProduct");

$router->run();
