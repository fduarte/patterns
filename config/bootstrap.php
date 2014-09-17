<?php
/**
 * This bootstrap file is responsible for kicking off the Front Controller cycle,
 * and general config stuff. 
 */

/**
 * Start the session
 */
session_start();

/**
 * Paths
 */
defined('BASE_PATH')
    || define('BASE_PATH',
              dirname(__DIR__));

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH',
              dirname(__DIR__) . '/src/App');

$includePath = get_include_path() 
             . PATH_SEPARATOR . APPLICATION_PATH . '/controllers'
             . PATH_SEPARATOR . APPLICATION_PATH . '/models'
             . PATH_SEPARATOR . APPLICATION_PATH . '/views';
set_include_path($includePath);

/**
 * Setting error reporting when
 * in 'dev' and not in 'cli' 
 */
if (PHP_SAPI != 'cli') {
    if ('development' === $_SERVER['APPLICATION_ENV']) {
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    }
}

/**
 * Composer Autoloader
 *
 * Example of autoloading more namespaces:
 * $loader->add('Goiaba\\', __DIR__);
 */
$loader = require BASE_PATH . '/vendor/autoload.php';

/**
 * Include necessary 'Goiaba' classes for front-controller cycle.
 */
use Goiaba\Net\Http\Request as Request,
    Goiaba\Net\Http\Response as Response,
    Goiaba\Net\Http\FrontController as FrontController,
    Goiaba\Net\Http\Router as Router,
    Goiaba\Net\Http\Route as Route,
    Goiaba\Net\Http\RouteStaticPath as RouteStaticPath,
    Goiaba\Net\Http\Dispatcher as Dispatcher,
    Goiaba\Net\Http\View as View;

/**
 * Add routes
 *
 * Example of adding more routes:
 * $router->addRoute(new RouteStaticPath('/customers', 'Customer'));
 */
$router = new Router();
$router->addRoute(new RouteStaticPath('/jobs', 'JobsController'));
// $router->addRoute(new RouteStaticPath('/customers', 'Customer'));

/**
 * Dispatch
 */
$dispatcher = new Dispatcher();

$params = array(
          'GET'     => $_GET,
          'POST'    => $_POST,
          'SESSION' => $_SESSION,
          'COOKIE'  => $_COOKIE,
);

$request = new Request($params, $_SERVER['REQUEST_URI']);
$response = new Response(Response::VERSION_11);

/**
 * A 404 Error page is displayed if request doesn't match a valid route.
 */
$view = new View();
$view->setTemplate('error/404.php');
$view->pass('get', $request->getParam('GET', 'getKey'));
$view->pass('post', $request->getParam('POST'));

/**
 * The purpose of this closure is to sanitize data to be displayed in views.
 */
$view->pass('sanitize', function($data) {
    if (empty($data)) {
        return NULL;
    }

    if (is_array($data)) {
        foreach ($data as $key=>$val) {
            $newData[$key] = htmlspecialchars($val, ENT_COMPAT, 'UTF-8');
        }
        return $newData;
    } 

    return htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
});

/**
 * Yay! Let the Front Controller kick in!
 */
$frontController = new FrontController($router, $dispatcher);
$frontController->run($request, $response, $view);
