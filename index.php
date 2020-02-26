<?php
include_once('vendor/autoload.php');
include_once('classes/Session.php');

use web\Session;

Session::start();

$loader = new Twig_Loader_Filesystem("template");
$twig = new Twig_Environment($loader);
$template = $twig->load('template.html');


echo $template->render([
  'title' => 'Cakeveloper',
  'head' => 'head.html',
  'content' => 'index.html',
  'loggedIn' => Session::get('loggedIn'),
  'loggedInUser' => Session::get('loggedInUser')
]);

