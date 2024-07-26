<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");
$route->get("/contato", "Web:contact");
$route->get("/produtos", "Web:products");
$route->get("/detalhes", "Web:productsDetails");
$route->get("/carrinho","Web:cart");
$route->get("/entrar","Web:login");
$route->get("/faqs", "Web:faqs");



$route->group("/app");
$route->get("/", "App:home");

$route->group("/adm");
$route->get("/", "Admin:home");

$route->group(null);

$route->get("/ooops/{errcode}", "Error:error");


$route->dispatch();

if ($route->error()) {
    $route->redirect("/ooops/{$route->error()}");
}

ob_end_flush();