<?php

class MembersView
{
    private $model;
    private $controller;

    public function __construct( $model, $controller, $method = '', $params = [] )
    {
        $this->model = $model;
        $this->controller = $controller;

        if ( empty( $method ) ) {
            $this->members();
        } else{
            $this->member($method, $params[0]);
        }
    }

    public function members()
    {
        //vrati dizajn za stranicu članova
        $data['controller'] = $this->controller;

        require_once dirname( __DIR__ ) . '/resources/members.php';
    }

    public function member($method, $param)
    {
        //vrati dizajn za stranicu članova
        $data['controller'] = $this->controller;
        $data['method'] = $method;
        $data['param'] = $param;

        require_once dirname( __DIR__ ) . '/resources/member.php';
    }
}
