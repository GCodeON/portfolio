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
            'name' => 'Projects',
            'url'  => '/projects',
        ],
        [
            'name' => 'About',
            'url'  => '/about',
        ],
        [
            'name' => 'Blog',
            'url'  => '/about',
        ],
        [
            'name' => 'CV',
            'url'  => '/cv',
        ]


    ],
    "sub_menu" => [
        [
            'name' => 'Contact',
            'url'  => '/contact',
        ],
        [
            'name' => 'Software',
            'url'  => '/software',
        ],
        [
            'name' => 'Design',
            'url'  => '/design',
        ],
        [
            'name' => 'Services',
            'url'  => '/services',
        ]
    ],

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