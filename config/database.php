<?php

$url = parse_url(getenv("DATABASE_URL"));
$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);

return [

    'fetch' => PDO::FETCH_CLASS,
    'default' => env('DB_CONNECTION', 'pgsql'),
    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', $host),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', $database),
            'username' => env('DB_USERNAME', $username),
            'password' => env('DB_PASSWORD', $password),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],
        'sqlite_testing' => [
            'driver'        => 'sqlite',
            'database'  => storage_path() . '/testing.sqlite',
            'prefix'        => '',
        ],
    ],
    'migrations' => 'migrations',
        'redis' => [
            'client' => 'predis',
            'default' => [
                'url'     => env("REDIS_URL")
                ],

        ],
];
