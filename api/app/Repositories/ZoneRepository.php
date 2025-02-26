<?php

namespace App\Repositories;

use App\Models\Zone;

class ZoneRepository extends BaseRepository
{
    public function __construct(Zone $zone)
    {
        parent::__construct($zone);
    }

    public function create(): Zone
    {
        return new Zone();
    }
}
