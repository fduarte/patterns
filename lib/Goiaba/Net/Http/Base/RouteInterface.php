<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http\Base;

/**
 * Route interface
 *
 * Route decides which controller action should be used. The route is responsible
 * for matching against the current request. If the request returns true, the
 * method to create the action controller is called.
 *
 * @package Goiaba
 * @version @@package_version@@
*/
interface RouteInterface
{
    /**
     * Returns true if the route matches the passed request object
     *
     * @param Goiaba\Net\Http\Base\RequestInterface $request
     * @return true
     */
    public function matches(RequestInterface $request);

    /**
     * Returns the specific action controller
     *
     * @return Goiaba\Net\Http\ControllerAction
     */
    public function createActionController();
}
