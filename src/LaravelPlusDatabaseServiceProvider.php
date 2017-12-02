<?php
namespace Wuwx\LaravelPlusDatabase;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Connection;
use Illuminate\Database\Connectors\MySqlConnector;

class LaravelPlusDatabaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind('db.connector.mysql57', MySqlConnector::Class);
        Connection::resolverFor('mysql57', function ($connection, $database, $prefix, $config) {
            return new MySql57Connection($connection, $database, $prefix, $config);
        });
    }
}
