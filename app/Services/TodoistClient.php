<?php

namespace App\Services;

use GuzzleHttp\Client;

class TodoistClient
{
    private $client;
    private $api_key;

    public function __construct($api_key)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.todoist.com/rest/v1/'
        ]);
        $this->api_key = $api_key;
    }


    public function createTask($project_id, $task)
    {
        $params = [
            'json' => $task,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->api_key
            ]
        ];

        $response = $this->client->post("tasks", $params);

        return json_decode($response->getBody(), true);
    }
}
