<?php

class AboutController
{
    private $model;

    public function __construct( $model )
    {
        $this->model = $model;
    }

    public function current()
    {
        $this->model->message;
    }
}
