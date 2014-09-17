<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http;

use Goiaba\Net\Http\Base\RouterInterface,
    Goiaba\Net\Http\Base\DispatcherInterface,
    Goiaba\Net\Http\Base\RequestInterface,
    Goiaba\Net\Http\Base\ResponseInterface,
    Goiaba\Net\Http\Base\ViewInterface;

class FrontController
{
    /**
     * Router object
     *
     * @var Goiaba\Net\Http\Base\DispatcherInterface
     */
    protected $_router;

    /**
     * Dispatcher object
     *
     * @var Goiaba\Net\Http\Base\DispatcherInterface
     */
    protected $_dispatcher;

    /**
     * Create a new front controller object
     *
     * @param Goiaba\Net\Http\Base\RouterInterface $router
     * @param Goiaba\Net\Http\Base\DispatcherInterface $dispatcher
     */
    public function __construct(RouterInterface $router, DispatcherInterface $dispatcher)
    {
        $this->_router = $router;
        $this->_dispatcher = $dispatcher;
    }

    /**
     * Run the front controller
     *
     * @param Goiaba\Net\Http\Base\RequestInterface $request
     * @param Goiaba\Net\Http\Base\ResponseInterface $response
     * @param Goiaba\Net\Http\Base\ViewInterface $view
     * @return void
     */
    public function run(RequestInterface $request, ResponseInterface $response, ViewInterface $view)
    {
        $route = $this->_router->route($request, $response);

        while (!$response->isError() and !$request->isDispatched()) {
            $this->_dispatcher->dispatch($route, $request, $response, $view);
        }

        $response->send($view);
    }
}
