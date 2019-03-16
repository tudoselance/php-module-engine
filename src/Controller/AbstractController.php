<?php

namespace Component\Controller;

abstract class AbstractController
{
    protected $service;
    protected $request;

    public function __construct( $service, $request )
    {
        $this->service = $service;
        $this->request = $request;
    }
}