<?php
require 'vendor/autoload.php';
require 'rb/rb.php';
R::setup("sqlite:db.db");

$app = new \Slim\Slim();

$app->get('/hello/:name', function ($name) {
        echo "Hello, $name";
        });

$app->run();

