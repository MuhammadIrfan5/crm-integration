<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnquiryRequest;
use App\Services\CRM\EnquiryService;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{

    protected $service;

  public function __construct(EnquiryService $enquiryService) {
        $this->service = $enquiryService;
    }


    public function store(EnquiryRequest $request)
    {
        
        // Validate the request data
        $validated = $request->validated();

        if (validator($validated)->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }
       

        // Call the send method from EnquiryService and pass the subscriber ID and message
        $enquiry = $this->service->send($validated['subscriberId'], $validated['message']);

        if ($enquiry) {
            return response()->json(['enquiry' => $enquiry], 200);
        }

        return response()->json(['error' => 'Failed to send enquiry'], 500);
    }
}
