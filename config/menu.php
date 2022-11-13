<?php

return [
    'pages' =>
    [
        [
            'types' => ['leader', 'distributor'],
            'id' => 'locations',
            'text' => 'Locations',
            'link' => '#',
            'children' => [
                [
                    'types' => ['leader', 'distributor'],
                    'text' => 'Add',
                    'link' => '/locations/create'
                ],
                [
                    'types' => ['leader', 'distributor'],
                    'text' => 'All Points',
                    'link' => '/locations/path'
                ]
            ]
        ],
        [
            'types' => ['leader', 'admin'],
            'id' => 'groups',
            'text' => 'Group',
            'link' => '#',
            'children' => [
                [
                    # Not implemented yet
                    'types' => ['admin'],
                    'text' => 'Add',
                    'link' => '/groups/create'
                ],
                [
                    # Not implemented yet
                    'types' => ['admin'],
                    'text' => 'Index',
                    'link' => '/groups/'
                ],
                [
                    'types' => ['leader'],
                    'text' => 'Users',
                    'link' => '/groups/users'
                ]
            ]
        ]
    ]
];
