<?php

class AboutView
{
    private $model;
    private $controller;

    public function __construct( $model, $controller )
    {
        $this->model = $model;
        $this->controller = $controller;

        $this->about();
    }

    public function about()
    {
        require_once dirname(__DIR__) . '/resources/about.php';
    }

    public function now()
    {
        $this->model->now_days();

        return '<br>' . $this->model->message;
    }

    public function today()
    {
        return $this->controller->current();
    }
}
