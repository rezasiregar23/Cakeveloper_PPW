<?php
include_once('classes/Session.php');

use web\Session;

Session::start();

if(Session::has("loggedIn")){
  Session::remove("loggedIn");
  Session::remove("loggedInUser");
}

header("Location: index.php");
die;
