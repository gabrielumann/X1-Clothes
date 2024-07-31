<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Faq\Question;
class   Web{


    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
    }

    public function home ()
    {
        echo $this->view->render("home",[
            "title" => "Home | " . SITE,
        ]);
    }

    public function about ()
    {
        echo $this->view->render("about",[ "title" => "Sobre | ". SITE,]);
    }

    public function contact ()
    {
        echo $this->view->render("contact",[ "title" => "Contatos | ". SITE,]);
    }

    public function products ()
    {
        echo $this->view->render("products",[ "title" => "Produtos | ". SITE,]);
    }
    public function productsDetails()
    {
        echo $this->view->render("products-details",[ "title" => "{nomedoproduto} | ". SITE,]);
    }

    public function faqs ()
    {
        echo $this->view->render("faqs",[ "title" => "FAQS | ". SITE,]);
    }

    public function cart () : void
    {
        echo $this->view->render("cart",[ "title" => "Carrinho | ". SITE,]);
    }

    public function login() : void
    {
        echo $this->view->render("login",[ "title" => "Entrar | ". SITE,]);
    }

    public function error(array $data)
    {
        echo $this->view->render("error",[
            "title" => "Erro | ". SITE,
            "error" => $data["errcode"]
        ]);
    }
}