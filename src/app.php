<?php

use StudentApp\HeroesTourModule\HeroesTourModule;

require_once __DIR__ . '/../vendor/autoload.php';

$app = \Ox3a\Common\StudentApplication::init(
    [
        'configDirs' => [
            __DIR__ . '/../configs',
            __DIR__ . '/configs',
            __DIR__ . '/../vendor/0x3a/student-app/src/Common/configs',
        ],
        'modules'    => [
            new HeroesTourModule()
        ],
    ]
);

return $app;
