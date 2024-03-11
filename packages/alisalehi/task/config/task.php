<?php
return [
    'user'       => [
        'table' => 'users',
        'model' => 'App\Models\User',
    ],
    'middleware' => 'AliSalehi\Task\Http\Middleware\TaskMiddleware'
];