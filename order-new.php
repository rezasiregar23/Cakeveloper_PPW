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
$cakes = $database->select(
    "cake",
    "*",
    [
        "ORDER" => ["cake.code" => "ASC"]
    ]
);

echo $template->render([
    'title' => 'Cakeveloper',
    'head' => 'head.html',
    'content' => 'order-new.html',
    'loggedIn' => Session::get('loggedIn'),
    'loggedInUser' => Session::get('loggedInUser'),
    'cakes' => $cakes
]);
