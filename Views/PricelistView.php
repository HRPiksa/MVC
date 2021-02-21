<?php

class PricelistView
{
    private $model;
    private $controller;

    public function __construct( $model, $controller, $method = '', $params = [] )
    {
        $this->model = $model;
        $this->controller = $controller;

if ( empty( $method ) ) {
    $this->pricelist();
} else {
    $this->price( $method, $params[0] );
}
    }

    public function pricelist()
    {
        //vrati dizajn za stranicu cjenika
        $data['controller'] = $this->controller;

        require_once dirname( __DIR__ ) . '/resources/pricelist.php';
    }

    public function price($method, $param)
    {
        //vrati dizajn za stranicu članova
        $data['controller'] = $this->controller;
        $data['method'] = $method;
        $data['param'] = $param;

        require_once dirname( __DIR__ ) . '/resources/price.php';
    }
}
