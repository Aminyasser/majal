<?php
return [
    'driver' => env('MAIL_DRIVER', 'mail'),
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),
    'port' => env('MAIL_PORT', 587),
    'from' => ['address' => 'users.sup.pro00@gmail.com', 'name' => 'Campo.App'],
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'username' => 'users.sup.pro00@gmail.com',
    'password' => 'vzpczvamqayebeih',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,
    'stream' => [
        'ssl' => [
            'allow_self_signed' => true,
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ],
];
