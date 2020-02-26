<?php
include_once('vendor/autoload.php');
include_once('classes/Session.php');

use web\Session;

Session::start();

$nama = $_POST["name"];
Session::set("loggedIn", true);
Session::set("loggedInUser", $nama);
$nextPage = "order-all.php";

header("Location: $nextPage");
