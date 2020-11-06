<?php

return [
    'frontend' => [
        'layout' => env('CW_LAYOUT', 'layouts.app'),
        'views' => env('CW_VIEWS', ''),
    ],
    'backend' => [
        'layout' => env('CW_DASHBOARD_LAYOUT', 'layouts.app'),
        'views' => env('CW_DASHBOARD_VIEWS', ''),
    ],
];