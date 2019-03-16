<?php
namespace Component\Router;

use Component\Request\Request;

class Router
{
    protected $service;

    public function __construct( $service )
    {
        $this->service = $service;
    }
    
    private function route()
    {
        return isset( $_GET['_route'] ) ? $_GET['_route'] : null;
    }
    
    private function match()
    {
        return ! is_null( $this->route() ) && isset( $this->service->config->get('routes')[ $this->route() ] ) ? $this->service->config->get('routes')[ $this->route() ] : false;
    }
    
    public function dispatch()
    {

        if ( ! $this->match() ) {
            return 404;
        }
        
        $match = $this->match();
        
        if ( isset( $match['middleware'] ) ) {
            $class = $match['middleware']['class'];
            $method = $match['middleware']['method'];
            $response = ( new $class( $this->service, new Request() ) )->$method();
            if ( $response ) {
                return $response;
            }
        }

        $class = $match['class'];
        $method = $match['method'];

        return ( new $class( $this->service, new Request() ) )->$method();
    }
}