<?php

namespace Component\View;

class View
{
    protected $__path;
    protected $__variables;
    protected $__layout;

    public function __construct($path, array $variables = null, $layout = 'layout/root.phtml')
    {
        $this->__path = $path;
        $this->__variables = $variables;
        $this->__layout = $layout;
    }

    public function __get($name)
    {
        return isset($this->__variables[$name]) ? $this->__variables[$name] : null;
    }

    public function __isset($name)
    {
        return isset($this->__variables[$name]);
    }

    public function render($path, array $variables = null, $layout = null)
    {
        return new View($path, $variables, $layout);
    }

    public function __toString()
    {
        if (file_exists($this->__path)) {
            ob_start();
            include $this->__path;
            $view = ob_get_contents();
            ob_end_clean();

            if ($this->__layout) {
                $layout = (string)$this->render($this->__layout, ['content' => $view, 'data' => $this]);

                return $layout;
            }

            return $view;
        }

        return 'Wrong view... (' . $this->__path . ')';
    }

}
