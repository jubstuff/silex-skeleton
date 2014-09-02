<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\SwiftmailerServiceProvider;
use Silex\Provider\ValidatorServiceProvider;

$app = new Application();
$app->register(new TwigServiceProvider());
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(
    new TranslationServiceProvider(),
    array(
        'translator.domains' => array(),
    )
);
$app->register(new FormServiceProvider());
$app->register(new SwiftmailerServiceProvider());

return $app;

