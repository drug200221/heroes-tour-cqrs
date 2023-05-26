<?php

return [
    'services' => [
        // БД
        Ox3a\Service\DbServiceInterface::class => [
            'concrete'  => Ox3a\Service\DbService::class,
            'arguments' => [
                'config',
            ],
        ],
    ],
];