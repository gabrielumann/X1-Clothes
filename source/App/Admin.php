<?php

namespace Source\App;

use League\Plates\Engine;

class Admin{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/adm","php");
    }

    public function home ()
    {
        echo $this->view->render("home",[
            "title" => "Home | ADM",
        ]);
    }
    public function products ()
    {
        echo $this->view->render("products",[
            "title" => "Produtos | ADM",
        ]);
    }
    public function orders ()
    {
        echo $this->view->render("orders",[
            "title" => "Pedidos | ADM",
        ]);
    }
    public function users ()
    {
        echo $this->view->render("users",[
            "title" => "Usuarios | ADM",
        ]);
    }
    public function faqs ()
    {
        echo $this->view->render("faqs",[
            "title" => "FAQS | ADM",
        ]);
    }
    public function rating ()
    {
        echo $this->view->render("rating",[
            "title" => "Avaliações | ADM",
        ]);
    }
}