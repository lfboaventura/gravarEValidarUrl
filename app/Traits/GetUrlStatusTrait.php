<?php

namespace App\Traits;

use App\Models\Url;
use App\Models\UrlStatus;
use GuzzleHttp\Client;


trait GetUrlStatusTrait
{

    public function getStatus()
    {
        $urls = Url::all();
        foreach ($urls as $key => $value) {
            $this->getCurl($value);
        }
    }

	public function getCurl($model = null)
	{
		if ( is_null($model)){
			return;
		}

		$client = new Client();
		try {
			$response = $client->request('GET',$model->address);
			$this->postUrlStatus($model->id, $response);
		} catch (GuzzleHttp\Exception\ClientException $e) {
			$response = $e->getResponse();
			$responseBodyAsString = $response->getBody()->getContents();
			$this->postUrlStatus($model->id, $responseBodyAsString);
		}		
	}

	public function postUrlStatus($url_id, $response = null ){
        $urlStatus = UrlStatus::create([
            'status'    => $response->getStatusCode() ? $response->getStatusCode() : '404',
            'url_id'    => $url_id,
            'data'      =>  $response->getStatusCode() ? ($response->getHeader('Content-Type')[0] . ' - ' . $response->getHeader('Date')[0]) : '404',
        ]);        

	}


}
