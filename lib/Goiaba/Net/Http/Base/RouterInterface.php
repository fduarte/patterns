<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http\Base;

/**
 * Router interface
 *
 * The router implements the strategy how a request is matched against
 * the bunch of configured routes
 *
 * @package Goiaba
 * @version @@package_version@@
 */
interface RouterInterface
{
    /**
     * Add a route to the list of routes used to decide where to route the request too
     *
     * @param Goiaba\Net\Http\Base\RouteInterface $route
     * @return Goiaba\Net\Http\Base\RouterInterface
     */
    public function addRoute(RouteInterface $route);

    /**
     * Route the request and return the appropriate route
     *
     * @param Goiaba\Net\Http\Base\RequestInterface $request
     * @param Goiaba\Net\Http\Base\ResponseInterface $response
     * @return Goiaba\Net\Http\Base\RouteInterface Returns the responsible route
     */
    public function route(
        RequestInterface $request, 
        ResponseInterface $response
    );
}
