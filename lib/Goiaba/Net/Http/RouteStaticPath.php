<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http;

use Goiaba\Net\Http\Base\RequestInterface,
    Goiaba\Net\Http\Base\RouteInterface;

/**
 * Static path route
 *
 * Matches a route with a simple case-sensitive string comparison to the
 * request path
 *
 * @package Goiaba
 * @version @@package_version@@
 */
class RouteStaticPath implements RouteInterface
{
    protected $_path;
    protected $_actionControllerClass;

    public function __construct($path, $actionControllerClass)
    {
        $this->_path = $path;
        $this->_actionControllerClass = $actionControllerClass;
    }

    public function matches(RequestInterface $request)
    {
        if (!$request instanceof Request) {
            return false;
        }

        return $this->_path === $request->getPath();
    }

    public function createActionController()
    {
        $class = 'App\\Controllers\\' . $this->_actionControllerClass;
        return new $class;
    }
}
