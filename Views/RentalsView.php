<?php

class RentalsView
{
    private $model;
    private $controller;

    public function __construct( $model, $controller, $method = '', $params = array() )
    {
        $this->model = $model;
        $this->controller = $controller;

        if ( empty( $method ) ) {
            $this->rentals();
        } else {
            $this->rental( $method, $params[0] );
        }
    }

    public function rentals()
    {
        //vrati dizajn za stranicu posudbi
        $data['controller'] = $this->controller;

        require_once dirname( __DIR__ ) . '/resources/rentals.php';
    }

    public function rental( $method, $param )
    {
        //vrati dizajn za stranicu posudbi
        $data['controller'] = $this->controller;
        $data['method'] = $method;
        $data['param'] = $param;

        require_once dirname( __DIR__ ) . '/resources/rental.php';
    }
}