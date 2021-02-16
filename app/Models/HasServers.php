<?php

namespace App\Models;

trait HasServers
{
    public function servers()
    {
        return $this->hasMany(Server::class);
    }
}
