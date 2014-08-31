<?php

$app->get('/', function() use ($app) {
    return $app['twig']->render('hello.twig', array(
        'name' => 'World',
    ));
})
->bind('home');

$app->get('/goodbye', function() use ($app) {

    return $app['twig']->render('goodbye.twig');
})->bind('goodbye');
