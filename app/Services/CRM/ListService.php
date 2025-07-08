<?php
namespace App\Services\CRM;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ListService
{
    protected $client;
    protected $baseUrl;
    protected $token;

    //  here we are doing constructor based dependency injection we have setup the base url and token in the crm config file in config/crm.php
    public function __construct(CrmClient $client)
    {
        $this->client = $client;
        $this->baseUrl = config('crm.base_url');
        $this->token = config('crm.token');
    }

    //  getting the list from the CRM API 
    public function getLists(): array
    {
        $response = Http::withToken($this->token)
            ->get("{$this->baseUrl}/lists");

        return $response->json('lists');
    }
}
