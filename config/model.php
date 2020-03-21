<?php

return [

    'user' => [
        'status' => [ #inUse
            'active',
            'locked',
            'canceled',
            'inactive',
        ],

        'access_profile' => [ #inUse
            'visitant', // 10
            'partner', // 20
            'member', // 30
            'attendance', // 40
            'support', // 50
            'manager', // 60
            'root', // 80
            'admin', // 90
            'superuser', // 99
        ],
    ],

    'person' => [
        'type' => [ #inUse
            'physical',
            'artificial',
            'juridical',
        ],
    ],

    'address' => [
        'type' => [ #inUse
            'primary',
            'business',
            'billing',
            'delivery',
        ],
    ],

    'membership' => [
        'contract_read' => [ #inUse
            'no',
            'yes',
        ],

        'graduate' => [ #inUse
            'partner',
            'member',
            '1_star',
            '2_star',
            '3_star',
            'manager',
            'manager_25k',
            'manager_50k',
            'director_100k',
            'director_250k',
            'director_500k',
            'millionaire_1m',
            'millionaire_25m',
            'millionaire_5m',
            'chairman_10m',
            'chairman_25m',
            'chairman_50m',
        ],

        'status' => [ #inUse
            'active',
            'inactive',
        ],

        'default_company_id' => 3,
    ],

];
