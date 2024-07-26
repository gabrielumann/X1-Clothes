<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Faq\Question;
class Web{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
    }

    public function home ()
    {
        echo $this->view->render("home",[]);
    }

    public function about ()
    {
        echo $this->view->render("about",[]);
    }

    public function contact ()
    {
        echo $this->view->render("contact",[]);
    }

    public function products ()
    {
        echo $this->view->render("products",[]);
    }
    public function productsDetails()
    {
        echo $this->view->render("products-details",[]);
    }

    public function faqs ()
    {
        echo $this->view->render("faqs",[]);
    }

    public function cart () : void
    {
        echo $this->view->render("cart",[]);
    }

    public function login() : void
    {
        echo $this->view->render("login",[]);
    }


}