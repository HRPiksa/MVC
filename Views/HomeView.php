<?php

class HomeView
{
    private $model;
    private $controller;

    public function __construct($model, $controller)
    {
        $this->model = $model;
        $this->controller = $controller;

        //print "Home - ";

        $this->home();
    }

    public function home()
    {
        //return $this->controller->say_welcome();

        $data['controller'] = $this->controller;
        require_once dirname(__DIR__) . '/resources/home.php';
    }
}
