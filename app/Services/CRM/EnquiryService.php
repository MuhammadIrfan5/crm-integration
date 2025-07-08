<?php
namespace App\Services\CRM;

class EnquiryService
{
    protected $client;

    public function __construct(CrmClient $client)
    {
        $this->client = $client;
    }

    public function send(string $subscriberId, string $message): ?array
    {
        $response = $this->client->post("/subscriber/{$subscriberId}/enquiry", [
            'message' => $message,
        ]);

        return $response?->json('enquiry');
    }
}
