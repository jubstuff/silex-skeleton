<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

$app = new Application();
$app->register(new TwigServiceProvider());
$app->register(new UrlGeneratorServiceProvider());

return $app;

