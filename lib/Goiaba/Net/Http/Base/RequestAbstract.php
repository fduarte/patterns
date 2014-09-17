<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http\Base;

use Goiaba\Net\Http\Base\RequestInterface;

abstract class RequestAbstract implements RequestInterface 
{

    protected $_params;

    /**
    * Request dispach status
    *
    * @var bool
    */
    protected $_dispatched = false;

    public function __construct(array $params = array())
    {
    $this->_params = $params;
    }

    /**
    * Returns true if the request is dispatched
    *
    * @return bool
    */
    public function isDispatched()
    {
     return $this->_dispatched;
    }

    /**
    * Dispatch the request again
    *
    * @return Goiaba\Net\Http\Base\RequestAbstract
    */
    public function dispatchAgain()
    {
     $this->_dispatched = false;

     return $this;
    }

    /**
    * Stop the request dispatching
    *
    * @return Goiaba\Net\Http\Base\RequestAbstract
    */
    public function stopDispatching()
    {
     $this->_dispatched = true;

     return $this;
    }

    /**
    * Get request parameter
    *
    * Returns a value of the request parameters struct
    *
    * @param string $namespace Namespace name
    * @param string $key Key name
    * @param mixed $default Default value if key or namespace not found
    */
    public function getParam($namespace = null, $key = null, $default = null)
    {
     if ($namespace === null) {
         return $this->_params;
     }

     if (!isset($this->_params[$namespace])) {
         return $default;
     }

     if ($key === null) {
         return $this->_params[$namespace];
     }

     if (!isset($this->_params[$namespace][$key])) {
         return $default;
     }

     return $this->_params[$namespace][$key];
    }
}
