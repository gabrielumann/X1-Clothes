<?php

namespace Source\App;

use League\Plates\Engine;

class Error {
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/error","php");
    }

    public function error(array $data)
    {
        echo $this->view->render("error",[$data]);
    }
}