<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;
use App\Services\CRM\SubscriberService;

class SubscriberController extends Controller
{

    protected $service;
     // Constructor based dependency injection for SubscriberService and ListService
    public function __construct(SubscriberService $subscriberService) {
        $this->service = $subscriberService;
    }

    // calling the store method to create a new subscriber from the subcriber service and validating the request data
public function store(SubscriberRequest $request)
{
    // Validate the request data
    $validated = $request->validated();

    if(validator($validated)->fails()) {
        return response()->json(['errors' => $validated->errors()], 422);
    }

    if(( $validated['marketing_consent'] == 'false' || $validated['marketing_consent'] == 0) && empty($validated['lists'])) {
        $validated['lists'] = [];
    }
    
    // calling create method from SubscriberService and passing the data into it
    $subscriber = $this->service->create([
        'emailAddress' => $validated['email'],
        'firstName' => $validated['first_name'],
        'lastName' => $validated['last_name'],
        'dateOfBirth' => $validated['date_of_birth'],
        'marketingConsent' => $validated['marketing_consent'],
        'lists' => $validated['marketing_consent'] ?? [],
    ]);

    return response()->json(['subscriber' => $subscriber]);
}



}
