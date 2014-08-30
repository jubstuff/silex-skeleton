<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;

$app = new Application();
$app->register(new TwigServiceProvider());

return $app;

