<?php

namespace Component\Request;

class Request
{
    public function get( $name )
    {
        return $this->hasGet( $name ) ? $_GET[ $name ] : null;
    }

    public function hasGet( $name )
    {
        return isset( $_GET[$name] );
    }

    public function post( $name )
    {
        return $this->hasPost( $name ) ? $_POST[ $name ] : null;
    }

    public function hasPost( $name )
    {
        return isset( $_POST[$name] );
    }

    public function isPost()
    {
        return 'POST' === $_SERVER['REQUEST_METHOD'];
    }
}