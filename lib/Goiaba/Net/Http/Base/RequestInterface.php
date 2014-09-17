<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http\Base;

interface RequestInterface
{
    /**
     * Returns true if the request is dispatched
     *
     * @return bool
     */
    public function isDispatched();

    /**
     * Dispatch the request again
     *
     * @return Goiaba\Net\Http\RequestInterface
     */
    public function dispatchAgain();

    /**
     * Stop the request from being dispatched
     *
     * @return Goiaba\Net\Http\RequestInterface
     */
    public function stopDispatching();

    /**
     * Get request parameter
     *
     * Returns a value of the request parameters struct
     *
     * @param string $namespace Namespace name
     * @param string $key Key name
     * @param mixed $default Default value if key or namespace not found
     */
    public function getParam($namespace = null, $key = null, $default = null);

}
