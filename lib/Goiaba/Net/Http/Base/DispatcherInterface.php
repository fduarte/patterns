<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http\Base;

interface DispatcherInterface
{
    /**
     * Dispatches the request to a concrete action controller class for the given route
     *
     * @param Goiaba\RouteInterface $route
     * @param Goiaba\RequestInterface $request
     * @param Goiaba\ResponseInterface $response
     * @param Goiaba\ViewInterface $view
     * @return void
     */
    public function dispatch(
        RouteInterface $route,
        RequestInterface $request,
        ResponseInterface $response,
        ViewInterface $view
    );
}
