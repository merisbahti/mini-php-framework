<?php
#Loads twig & slim
require 'vendor/autoload.php';
#Loads & initialises RedBeanPHP
require 'rb/rb.php';
R::setup("sqlite:db.db");

$app = new \Slim\Slim();
$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader);

$app->get('/hello/:name', function ($name) use ($twig) {
    echo $twig->render('index_example.html', array('name' => $name));
  });

$app->run();
