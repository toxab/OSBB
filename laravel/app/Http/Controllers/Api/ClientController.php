<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\ClientApp;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $complaints = ClientApp::all();
        return $this->getResponse($complaints);
    }
    
    /**
     * @param ClientRequest $request
     * @return JsonResponse
     */
    public function store(ClientRequest $request)
    {
        $newComplaint = ClientApp::create($request->all());
        return $this->getResponse($newComplaint, __('created'), 201);
    }
}
