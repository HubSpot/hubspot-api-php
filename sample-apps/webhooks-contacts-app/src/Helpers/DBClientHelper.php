<?php

namespace Helpers;

use PDO;

class DBClientHelper
{
    private static $dbClient = null;

    public static function getClient(): PDO
    {
        if (!self::$dbClient) {
            $pdo = new PDO('mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            self::$dbClient = $pdo;
        }

        return self::$dbClient;
    }

    public static function runMigrations()
    {
        $uri = 'mysql://'.$_ENV['DB_USERNAME'].':'.$_ENV['DB_PASSWORD'].'@'.$_ENV['DB_HOST'].'/'.$_ENV['DB_NAME'];
        $connectionUri = new \ByJG\Util\Uri($uri);
        $migration = new \ByJG\DbMigration\Migration($connectionUri, __DIR__.'/../../sql');
        $migration->registerDatabase('mysql', \ByJG\DbMigration\Database\MySqlDatabase::class);

        try {
            $migration->getCurrentVersion();
        } catch (\Throwable $t) {
            $migration->reset();
        }
        $migration->update($version = null);
    }
}
