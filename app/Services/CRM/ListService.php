<?php
namespace App\Services\CRM;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ListService
{
    protected $client;
    //  here we are doing constructor based dependency injection we have setup the base url and token in the crm config file in config/crm.php
    public function __construct(CrmClient $client)
    {
        $this->client = $client;
    }

    //  getting the list from the CRM API 
    public function getLists(): array
    {
        $response = $this->client->get("/lists");

        return $response->json('lists');
    }
}
