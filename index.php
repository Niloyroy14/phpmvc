<?php


use Pecee\SimpleRouter\SimpleRouter;


/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/vendor/autoload.php';

//Load from environment variable
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('ROOT',__DIR__);
define('VIEWS',__DIR__.'/views');
define('BASE_DIR',isset($_ENV['BASE_DIR']) ? $_ENV['BASE_DIR'] : '');

//http://localhost/phpmvc/
define('URL',$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . BASE_DIR);

define('ASSET_URL', URL .'/assets');

/* Load external routes file */
require_once 'routes/web.php';

/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */

SimpleRouter::setDefaultNamespace('\APP\Controllers');

// Start the routing
SimpleRouter::start();