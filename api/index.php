<?php
ob_start();
require  __DIR__ . "/../vendor/autoload.php";
use CoffeeCode\Router\Router;

$route = new Router(url("api"),":");
$route->namespace("Source\App\Api");

$route->group("/faqs");
$route->get("/","Faqs:listFaqs");
$route->get("/{id}", "Faqs:getFaq");
$route->post("/","Faqs:createFaq");
$route->post("/update/{id}", "Faqs:updateFaq");
$route->post("/delete/{id}","Faqs:deleteFaq");

$route->group("/users");
$route->get("/", "Users:listUsers");
$route->get("/{id}", "Users:getUser");
$route->post("/","Users:createUser");
$route->post("/update/{id}", "Users:updateUser");
$route->post("/change-password/{id}","Users:changePassword");
$route->post("/delete/{id}","Users:deleteUser");
$route->post("/login","Users:loginUser");

$route->group("/category");
$route->get("/", "Products:listCategories");

$route->group("/products");
$route->get("/", "Products:listProducts");
$route->get("/{id}", "Products:getProduct");
$route->post("/","Products:createProduct");
$route->post("/update/{id}", "Products:updateProduct");
$route->post("/delete/{id}","Products:deleteProduct");


$route->dispatch();

/** ERROR REDIRECT */
if ($route->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "errors" => [
            "type " => "endpoint_not_found",
            "message" => "Não foi possível processar a requisição"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

ob_end_flush();
