<?php

namespace Source\App;

use League\Plates\Engine;

class App{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/app","php");
    }
    public function home (){
        echo $this->view->render("home",[
            "title" => "Home | " . SITE,
        ]);
    }
    public function  profile()
    {
        echo $this->view->render("profile",[ "title" => "Perfil | ". SITE,]);
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
    public function cart () : void
    {
        echo $this->view->render("cart",[ "title" => "Carrinho | ". SITE,]);
    }
    public function faqs ()
    {
        echo $this->view->render("faqs",[ "title" => "FAQS | ". SITE,]);
    }


}