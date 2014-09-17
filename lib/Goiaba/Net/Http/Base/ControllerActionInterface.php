<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http\Base;

interface ControllerActionInterface
{
    /**
     * Execute the action controller
     *
     * @param Goiaba\RequestInterface $request
     * @param Goiaba\ResponseInterface $response
     * @param Goiaba\ViewInterface $view
     * @return bool
     */
    public function execute(
        RequestInterface $request, 
        ResponseInterface $response, 
        ViewInterface $view
    );
}
