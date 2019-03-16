<?php

namespace Component\Config;

class Config
{
    protected $data;

    public function __construct( array $data )
    {
        $this->data = $data;
    }

    public function get( $name )
    {
        if ( isset( $this->data[$name] ) ) {
            return $this->data[$name];
        }
    }
}