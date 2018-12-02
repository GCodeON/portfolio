<?php

return [

    /*
     * Select views to load and their order for menu generation
     */
    'menu' => [
        'typography',
        'buttons',
        'cards',
        'elements',
        'carousels',
        'menu'
    ],

    'view_path' => 'styleguide',

    'title' => 'Style Guide',

    'assets_path' => '/vendor/cswiley/styleguide/assets',

    /*
    |--------------------------------------------------------------------------
    | The prefix you wish to use with your style guide installation
    |--------------------------------------------------------------------------
    |
    | specify the domain prefix you would like your users to visit in order
    | to view the Style Guide page
    |
    */

    'prefix'      => 'styleguide',


    /*
     |--------------------------------------------------------------------------
     | Application stylesheets
     |--------------------------------------------------------------------------
     |
     | Specify your application stylesheets to load
     */
    'stylesheets' => [
        '/css/app.css',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application script
    |--------------------------------------------------------------------------
    |
    | Specify your application scripts to load
    */
    'scripts'     => [
        '/js/manifest.js',
        '/js/vendor.js',
        '/js/app.js'
    ]
];
