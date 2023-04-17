<?php

namespace App\Services;

use GuzzleHttp\Client;

class TodoistClient
{
    private $client;
    private $api_key;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('todoist.base_uri')
        ]);
        $this->api_key = config('todoist.api_key');
    }

    public function createTask($content, $project_id, $due_date_utc = null)
    {
        $params = [
            'json' => [
                'content' => $content,
                'project_id' => $project_id,
                'due_date_utc' => $due_date_utc
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $this->api_key
            ]
        ];

        $response = $this->client->post('tasks', $params);

        return json_decode($response->getBody());
    }
}
