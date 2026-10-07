<?php

namespace App\Services;

use Supabase\Client;

class supabaseService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(
            config('services.supabase.url'),
            config('services.supabase.key')
        );
    }

    public function getClient()
    {
        return $this->client;
    }

    public function from($table)
    {
        return $this->client->from($table);
    }
}
