<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function report()
    {

    }

    public function render()
    {
        return view("errors.not-found", with(["type" => $this->type]));
    }
}
