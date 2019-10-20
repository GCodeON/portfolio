<?php


return [

    /*
   |--------------------------------------------------------------------------
   | Application Menu
   |--------------------------------------------------------------------------
   |
   */
    'menu' => [
        [
            'name' => 'About',
            'url'  => '/about',
        ],
        [
            'name' => 'Projects',
            'url'  => '/projects',
        ],
        [
            'name' => 'Blog',
            'url'  => '/about',
        ]
    ],
    // "sub_menu" => [
    //     [
    //         'name' => 'Data',
    //         'url'  => '/data',
    //     ],
    //     [
    //         'name' => 'Software',
    //         'url'  => '/software',
    //     ],
    //     [
    //         'name' => 'Design',
    //         'url'  => '/design',
    //     ]
    // ],

    'admin_menu' => [
        [
            'name' => 'Users',
            'url'  => '/admin/users',
            'role' => 'admin'
        ],
        [
            'name' => 'CMS',
            'url'  => '/admin/cms',
        ],
        [
            'name' => 'Blog',
            'url'  => '/admin/blog',
        ],
        [
            'name' => 'Logout',
            'url'  => '/admin/logout',
        ],
    ]

];