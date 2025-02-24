<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreZoneRequest;
use App\Http\Requests\UpdateZoneRequest;
use App\Services\ZoneService;

class ZoneController extends Controller
{
    public function __construct(
        private ZoneService $zoneService
    ) {}


    /**
     * Get all zones
     */
    public function index()
    {
        return $this->zoneService->all();
    }

    /**
     * Get one zone
     */
    public function getOne($id)
    {
        return $this->zoneService->getOne($id);
    }

    /**
     * Store a new zone
     * 
     */
    public function store(StoreZoneRequest $request)
    {
        $data = $request->validated();

        return $this->zoneService->store($data);
    }

    /**
     * Update a zone
     */
    public function update(UpdateZoneRequest $request, $id)
    {
        $data = $request->validated();

        return $this->zoneService->update($id, $data);
    }

    /**
     * Delete a zone
     */
    public function destroy($id)
    {
        return $this->zoneService->destroy($id);
    }
}
