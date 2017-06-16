<?php

return [
    'settings' => [

        // Showing errors
        'displayErrorDetails' => true,

        // Add a Content-Length header to the response
        'addContentLengthHeader' => false,

        // View engine
        'view' => [
            'template_path' => __DIR__ . '/../views',
            'twig' => [
                'cache' => false
            ],
        ],

        // SMS Gateway
        'sms-gateway'   => [
            'api_key'    => $_ENV['SMS_API_KEY'],
            'api_secret' => $_ENV['SMS_API_SECRET'],
        ],
    ]
];