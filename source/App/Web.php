<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Faq\Question;

class Web
{
    private $view;

public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
    }

    public function home ()
    {
        //echo "<h1>Eu sou a Home</h1>";
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

    public function location ()
    {
        echo $this->view->render("location",[]);
    }

    public function cart () : void
    {
        echo $this->view->render("cart",[]);
    }

    public function login() : void
    {
        echo $this->view->render("login",[]);
    }

    public function faqs() : void
    {
        $question = new Question();
        $faqs = $question->selectAll();
        //var_dump($faqs);
        echo $this->view->render("faqs",[
            "faqs" => $faqs
        ]);
        //echo "Olá, FAQS";
    }

    public function error(array $data)
    {
        var_dump($data);
    }

}