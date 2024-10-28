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
$route->delete("/delete/{id}","Faqs:deleteFaq");

$route->group("/faqs/category");
$route->get("/","Faqs:listFaqCategories");
$route->get("/{id}", "Faqs:getFaqCategories");
$route->post("/","Faqs:createFaqCategories");
$route->post("/update/{id}", "Faqs:updateFaqCategories");
$route->delete("/delete/{id}","Faqs:deleteFaqCategories");


$route->group("/users");
$route->get("/", "Users:listUsers");
$route->get("/{id}", "Users:getUser");
$route->post("/","Users:createUser");
$route->post("/update/{id}", "Users:updateUser");
$route->post("/update/image/{id}", "Users:updateImage");
$route->post("/change-password/{id}","Users:changePassword");
$route->delete("/delete/{id}","Users:deleteUser");
$route->post("/login","Users:loginUser");
$route->get("/token-validate","Token:tokenValidate");
$route->get("/adm-permission-validate","Token:adminPermission");

$route->group("/users/address");
$route->get("/", "Addresses:listAddresses");
$route->get("/{id}", "Addresses:getAddressByUser");
$route->post("/","Addresses:createAddress");
$route->post("/update/{id}", "Addresses:updateAddress");
$route->delete("/delete/{id}","Addresses:deleteAddress");

$route->group("/products");
$route->get("/", "Products:listProducts");
$route->get("/{id}", "Products:getProduct");
$route->post("/","Products:createProduct");
$route->post("/update/{id}", "Products:updateProduct");
$route->delete("/delete/{id}","Products:deleteProduct");
$route->get("/images","Products:listImageProducts");

$route->group("/products/brands");
$route->get("/", "Brands:listBrands");
$route->get("/{id}", "Brands:getBrand");
$route->post("/","Brands:createBrand");
$route->post("/update/{id}", "Brands:updateBrand");
$route->delete("/delete/{id}","Brands:deleteBrand");

$route->group("/products/sizes");
$route->get("/", "Sizes:listSizes");
$route->get("/{id}", "Sizes:getSize");
$route->post("/","Sizes:createSize");
$route->post("/update/{id}", "Sizes:updateSize");
$route->delete("/delete/{id}","Sizes:deleteSize");

$route->group("/products/category");
$route->get("/", "Categories:listCategories");
$route->get("/{id}", "Categories:getCategory");
$route->post("/","Categories:createCategory");
$route->post("/update/{id}", "Categories:updateCategory");
$route->delete("/delete/{id}","Categories:deleteCategory");

$route->group("/products/stock");
$route->get("/", "Stocks:listStock");
$route->get("/{product_id}", "Stocks:getProductId");
$route->post("/","Stocks:AddProduct");
$route->post("/update/{product_id}", "Stocks:updateQuantity");
$route->delete("/delete/{product_id}","Stocks:deleteProduct");

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
