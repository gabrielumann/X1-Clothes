<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");

/*
 * Web
 */

$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");
$route->get("/contato", "Web:contact");
$route->get("/produtos", "Web:products");
$route->get("/detalhes", "Web:productsDetails");
$route->get("/carrinho","Web:cart");
$route->get("/entrar","Web:login");
$route->get("/faqs", "Web:faqs");

/*
 * App
 */
$route->group("/app");
$route->get("/", "App:home");

/*
 * Adm
 */
$route->group("/adm");
$route->get("/", "Admin:home");

$route->group(null);


$route->get("/ooops/{errcode}", "Web:error");

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ooops/{$route->error()}");
}

ob_end_flush();