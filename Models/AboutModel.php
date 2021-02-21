<?php

class AboutModel
{
    public $message;

    public function __construct()
    {
        $this->message = "Ovo je naša prva stranica za naš prvi PHP MVC framevork";
    }

    public function now_days()
    {
        $this->message = "Ovih dana učimo sve i svašta s klasama i objektima.";
    }
}
