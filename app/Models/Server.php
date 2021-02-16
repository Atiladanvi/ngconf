<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Server extends Model
{
    use MongoConnection;

    protected $fillable = ['*'];
}
