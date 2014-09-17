<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http\Base;

/**
 * Response interface
 *
 * Protocol agnostic response object defining generic error handling
 * methods that need to be implemented in the concrete response.
 *
 * @package Goiaba
 * @version @@package_version@@
 */
interface ResponseInterface
{
    /**
     * Raise processing error
     *
     * @return void
     */
    public function raiseProcessingError();

    /**
     * Raise routing error
     *
     * @return void
     */
    public function raiseRoutingError();

    /**
     * Returns true if the response is errornous
     *
     * @return bool
     */
    public function isError();

    /**
     * Send response
     *
     * The view is passed to the response to render and send the response in
     * one step. The response tells the view to render itself.
     *
     * @param Goiaba\Net\Http\Base\ViewInterface $view
     * @return void
     */
    public function send(ViewInterface $view);
}
