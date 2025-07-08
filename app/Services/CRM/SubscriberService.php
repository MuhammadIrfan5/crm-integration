<?php
namespace App\Services\CRM;

class SubscriberService
{
    protected $client;
    protected $listService;

    public function __construct(CrmClient $client, ListService $listService)
    {
        $this->client = $client;
        $this->listService = $listService;
    }

    public function create(array $data): ?array
    {
        // calling the post method on the CRM client to create a subscriber and passing the data coming form the Subscribner request which we 
        //  are passing from the controller
        $response = $this->client->post('/subscriber', $data);
        return $response?->json('subscriber');
    }
}
