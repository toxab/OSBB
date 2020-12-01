<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComplaintRequest;
use App\Models\ClientApp;
use App\Models\Complaint;
use Illuminate\Http\JsonResponse;

class ComplaintController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $complaints = Complaint::all();
        return $this->getResponse($complaints);
    }
    
    /**
     * @param ClientApp $client
     * @return JsonResponse
     */
    public function getComplaintByClient(ClientApp $client): JsonResponse
    {
        $complaints = Complaint::where('client_id', '=', $client->getAttribute('id'))->get();
        return $this->getResponse($complaints);
    }
    
    /**
     * @param Complaint $complaint
     * @return JsonResponse
     */
    public function getComplaintInWork(Complaint $complaint): JsonResponse
    {
        $complaint->in_work = 1;
        try {
            $complaint->saveOrFail();
        } catch (\Throwable $e) {
            return $this->getErrorResponse($e->getMessage());
        }
    
        return $this->getResponse($complaint);
    }
    
    /**
     * @param ComplaintRequest $request
     * @return JsonResponse
     */
    public function store(ComplaintRequest $request)
    {
        $newComplaint = Complaint::create($request->all());
        return $this->getResponse($newComplaint, __('created'), 201);
    }
}
