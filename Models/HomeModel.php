<?php

class HomeModel
{
    private $message = "Dobro došli na našu početnu stranicu!";

    public function welcome_message()
    {
        return $this->message;
    }
}
