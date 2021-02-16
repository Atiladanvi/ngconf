<?php

namespace App\Models;

trait MongoConnection
{
    public function getConnectionName()
    {
        return config('database.mongo_connection');
    }
}
