<?php
#Loads twig & slim
require 'vendor/autoload.php';
#Loads & initialises RedBeanPHP
require 'rb/rb.php';

R::setup("sqlite:db.db");

$bean 				= R::dispense('kontakter');
$bean['name'] = "Tim";
$id 					= R::store($bean);
//echo R::load('kontakter',$id)->telNr;

$app = new \Slim\Slim();
$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader);

$app->get('/hello/:name', function ($name) use ($twig) {
    echo $twig->render('index_example.html', array('name' => $name));
  });

$app->get('/hello/', function () use ($twig) {
    echo $twig->render('index_example.html', array('name' => ""));
  });

$app->run();
