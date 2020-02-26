<?php
include_once('vendor/autoload.php');
include_once('classes/Session.php');
include_once('config/database.php');
include_once('classes/Security.php');

use web\Session;
use Medoo\Medoo;
use web\Security;

Session::start();

$database = new Medoo($database_config);
$nextPage = "order-all.php";

$order = [
    'no' => Security::random(20),
    'customer_name' => $_POST["customer"],
    'address' => $_POST["address"],
    'phone' => $_POST["phone"],
    'cake' => $_POST["cake"],
    'quantity' => $_POST["quantity"],
    'placed_at' => date("Y-m-d H:i:s")
];

$database->insert('order', $order);
header("Location: {$nextPage}");
