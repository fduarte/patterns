<?php 
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http;

use Goiaba\Net\Http\Base\RouterInterface,
    Goiaba\Net\Http\Base\RouteInterface,
    Goiaba\Net\Http\Base\RequestInterface,
    Goiaba\Net\Http\Base\ResponseInterface;

/**
 * Router
 *
 * @package Goiaba
 * @version @@package_version@@
 */
class Router implements RouterInterface
{
    /**
     * List of routes
     *
     * @var Goiaba\Net\Http\Base\RouteInterface
     */
    protected $_routes = array();

    /**
     * Add a route to the list of routes
     *
     * @param Goiaba\Net\Http\Base\RouteInterface $route
     * @return Goiaba\Net\Http\Router
     */
    public function addRoute(RouteInterface $route)
    {
        $this->_routes[] = $route;

        return $this;
    }

    /**
     * Route the request to the matching route
     *
     * @param Goiaba\Net\Http\Base\RequestInterface $request
     * @param Goiaba\Net\Http\Base\ResponseInterface $response
     * @return void|Goiaba\Net\Http\Base\RouteInterface
     */
    public function route(RequestInterface $request, ResponseInterface $response)
    {
        $matchingRoute = null;

        foreach ($this->_routes as $route) {
            if ($route->matches($request)) {
                $matchingRoute = $route;
                break;
            }
        }

        if (!$matchingRoute) {
            $response->raiseRoutingError();
        }

        return $matchingRoute;
    }
}
