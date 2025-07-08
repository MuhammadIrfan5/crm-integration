<?php
namespace App\Services\CRM;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CrmClient
{

    protected $baseUrl;
    protected $token;

    //  here we are doing constructor based dependency injection we have setup the base url and token in the crm confid file in config/crm.php
    public function __construct()
    {
        $this->baseUrl = config('crm.base_url');
        $this->token = config('crm.token');
    }

    //  in this get method we are calling Http client from laravel to make a Get request to CRM API.
    public function get(string $endpoint)
    {
        try {
            return Http::withToken($this->token)
                ->get("{$this->baseUrl}{$endpoint}");
        } catch (\Throwable $e) {
            Log::error("crm get reuqest error at {$endpoint}", ['error' => $e->getMessage()]);
            return null;
        }
    }


//  in this get method we are calling Http client from laravel to make a Post request to CRM API.
    public function post(string $endpoint, array $data)
    {
        try {
            return Http::withToken($this->token)
                ->post("{$this->baseUrl}{$endpoint}", $data);
        } catch (\Throwable $e) {
            Log::error("crm POST request error at {$endpoint}", ['error' => $e->getMessage()]);
            return null;
        }
    }
}
