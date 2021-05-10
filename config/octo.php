<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Config
    |--------------------------------------------------------------------------
    |
    |
    |
    |
    */

    'navigation' => [
        'sidebar' =>  []
    ],

    'network' => [
        'facebook' => '#',
        'instagram' => '#',
        'youtube' => '#',
    ],

    'footer' => [
        'tagline' => "Copyright © " . date('Y') . " " . config('app.name')
    ],

    'plugins' => [
        'subscribe' => [
            'headline' => 'Something new is coming!',
            'tagline' => 'This application is on for testers. But you can test too. email: usain@speedest.dev password: UsainBolt. If you want to receive updates join our newsletter.'
        ]
    ]
];
