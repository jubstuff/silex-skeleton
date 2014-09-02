<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../src/app.php';
require_once __DIR__ . '/../config/dev.php';
require_once __DIR__ . '/../src/controllers.php';

$app->run();
