<?php
include_once('vendor/autoload.php');
include_once('classes/Session.php');
include_once('config/database.php');

use web\Session;
use Medoo\Medoo;

Session::start();

$database = new Medoo($database_config);

$loader = new Twig_Loader_Filesystem("template");
$twig = new Twig_Environment($loader);
$template = $twig->load('template.html');

$orders = $database->select(
    "order",
    [
        "[><]cake" => ["cake" => "code"]
    ],
    [
        "order.no",
        "order.customer_name",
        "cake.code",
        "cake.name",
        "order.quantity",
        "cake.price",
        "order.placed_at"
    ],
    [
        "order.canceled" => 0,
        "ORDER" => ["order.placed_at" => "ASC"]
    ]
);

echo $template->render([
    'title' => 'Cakeveloper',
    'head' => 'head_index.html',
    'content' => 'order-all.html',
    'loggedIn' => Session::get('loggedIn'),
    'loggedInUser' => Session::get('loggedInUser'),
    'orders' => $orders
]);
