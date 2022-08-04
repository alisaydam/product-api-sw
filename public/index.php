<?php

use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php'; 

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
 
 
define("DB_HOST", "us-cdbr-east-05.cleardb.net");
define("DB_USER", "ba871319ce1487");
define("DB_PWD", "7dbde77c");
define("DB_NAME", "heroku_b023fc8462d3a8e");

$router = new Router($_GET['url']);
 


$router->get('/products', 'App\Controllers\ProductsController@index');
$router->post('/products/create', 'App\Controllers\ProductsController@create');
$router->post('/products/delete', 'App\Controllers\ProductsController@delete');


try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
