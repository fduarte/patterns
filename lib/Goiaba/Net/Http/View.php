<?php
/**
 * Goiaba: Freddy's Test PHP Framework 
 *
 * @copyright     Copyright 2014, Freddy Duarte 
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace Goiaba\Net\Http;

use Goiaba\Net\Http\Base\ViewInterface,
    Goiaba\Net\Http\Base\ResponseInterface;

/**
 * Simple view
 *
 * The view allows passing some variables to be used in the template. This
 * specific view implementation just used PHP's include() function to do
 * the actual rendering.
 *
 * @package Goiaba
 * @version @@package_version@@
 */
class View implements ViewInterface
{
    /**
     * Template values
     *
     * @var array
     */
    protected $_values = array();

    /**
     * Template name
     *
     * @var string
     */
    protected $_template;

    /**
     * Render the template
     *
     * @return void
     */
    public function render()
    {
        $this->_render($this->_template);
    }

    protected function _render()
    {
        /**
         * To keep templates dense, we use the variable-variable trick to make helpers and template values available in
         * the template
         */
        foreach ($this->_values as $name => $value) {
            $$name = $value;
        }
        include func_get_arg(0);
    }

    public function pass($nameOrValue, $value = null)
    {
        if (is_array($nameOrValue)) {
            array_walk($nameOrValue, array($this, 'pass'));
        }

        $this->_values[$nameOrValue] = $value;

        return $this;
    }

    /**
     * Set view template
     *
     * @param string $template
     * @return Goiaba\Net\Http\View
     */
    public function setTemplate($template)
    {
        $this->_template = $template;

        return $this;
    }
}
