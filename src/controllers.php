<?php

$app->get('/', function() use ($app) {
    return $app['twig']->render('home.twig');
})
->bind('home');

$app->get('/about', function() use ($app) {
    return $app['twig']->render('about.twig');
})->bind('about');

$app->get('/contact', function() use ($app) {
    return $app['twig']->render('contact.twig');
})->bind('contact');
