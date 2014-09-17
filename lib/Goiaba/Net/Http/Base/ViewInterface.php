<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http\Base;

interface ViewInterface
{
    /**
     * Render the template
     *
     * @return void
     */
    public function render();

    /**
     * Pass a variable to the template
     *
     * @param string|hash If a hash is passed, the keys of the hash will be used for the
     *                    name of the template variable
     *                    Otherwise it's the name of the template variable
     * @param mixed|void Value of the template variable
     * @return Goiaba\Net\Http\Base\ViewInterface
     */
    public function pass($name, $value = null);

    /**
     * Set template name the view should render
     *
     * @param string $template Name of the template
     * @return Goiaba\Net\Http\ViewInterface
     */
    public function setTemplate($template);
}
