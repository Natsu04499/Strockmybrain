<?php

namespace App\Services;

use GuzzleHttp\Client;

class TodoistClient
{
    private $client;
    private $api_key;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;

        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.todoist.com/rest/v2/tasks',
            'verify' => false // désactiver la vérification SSL pour le moment
        ]);
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

