<?php

namespace Source\App;

use League\Plates\Engine;
use Source\App\Api\Api;

class Admin{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/adm","php");
    }

    public function home ()
    {
        echo $this->view->render("home",[
            "title" => "Pedidos | ADM",
        ]);
    }
    public function products ()
    {
        echo $this->view->render("products",[
            "title" => "Produtos | ADM",
        ]);
    }
    public function stock()
    {
        echo $this->view->render("stock",[
            "title" => "Estoque | ADM",
        ]);
    }
    public function categories()
    {
        echo $this->view->render("categories",[
            "title" => "Categorias | ADM",
        ]);
    }
    public function brands ()
    {
        echo $this->view->render("brands",[
            "title" => "Marcas | ADM",
        ]);
    }
    public function users ()
    {
        echo $this->view->render("users",[
            "title" => "Usuários | ADM",
        ]);
    }
    public function addresses ()
    {
        echo $this->view->render("addresses",[
            "title" => "Endereços | ADM",
        ]);
    }
    public function faqs ()
    {
        echo $this->view->render("faqs",[
            "title" => "FAQS | ADM",
        ]);
    }

}