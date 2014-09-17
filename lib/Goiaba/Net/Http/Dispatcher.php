<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http;

use Goiaba\Net\Http\Base\DispatcherInterface,
    Goiaba\Net\Http\Base\RouteInterface,
    Goiaba\Net\Http\Base\RequestInterface,
    Goiaba\Net\Http\Base\ResponseInterface,
    Goiaba\Net\Http\Base\ViewInterface;

class Dispatcher implements DispatcherInterface {
 
  public function dispatch(
            RouteInterface $route,
            RequestInterface $request,
            ResponseInterface $response,
            ViewInterface $view
    )
    {
        $controllerAction = $route->createActionController();
        if ($controllerAction->execute($request, $response, $view)) {
            $request->stopDispatching();
        }
    }
}
