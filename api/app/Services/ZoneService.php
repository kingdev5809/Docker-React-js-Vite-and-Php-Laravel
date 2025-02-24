<?php

namespace App\Services;

use App\Repositories\ZoneRepository;
use App\Traits\ResponseMessages;

class ZoneService
{
    use ResponseMessages;

    public function __construct(
        private ZoneRepository $zoneRepository,
    ) {}

    public function all()
    {
        return $this->zoneRepository->all();
    }

    public function getOne($id)
    {
        return $this->zoneRepository->findById($id);
    }

    public function store($data)
    {
        return $this->zoneRepository->store($data);
    }

    public function update($id, $data)
    {
        return $this->zoneRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->zoneRepository->delete($id);
    }
}
