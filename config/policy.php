<?php

return [

    'login' => [

        'enable' => true,

        'block' => [
            'attempts' => [
                'max_attempts' => 3,
                'duration' => '10 min',
            ],

            'absence' => [
                'max_days' => '365 days',
                'duration' => '1 years',
            ],
        ],
    ],

    'register' => [

        'enable' => true,

    ],

];