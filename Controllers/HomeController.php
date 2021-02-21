<?php

class HomeController
{
    private $model;

    public function __construct( $model )
    {
        $this->model = $model;
    }

    public function say_welcome()
    {
        return $this->model->welcome_message();
    }
}
