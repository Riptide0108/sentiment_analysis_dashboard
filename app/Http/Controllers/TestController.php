<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller
{
    public function index() {
        $data['tasks'] = [
                [
                        'name' => 'Design New Dashboard',
                        'progress' => '87',
                        'color' => 'danger'
                ],
                [
                        'name' => 'Create Home Page',
                        'progress' => '76',
                        'color' => 'warning'
                ],
                [
                        'name' => 'Some Other Task',
                        'progress' => '32',
                        'color' => 'success'
                ],
                [
                        'name' => 'Start Building Website',
                        'progress' => '56',
                        'color' => 'info'
                ],
                [
                        'name' => 'Develop an Awesome Algorithm',
                        'progress' => '10',
                        'color' => 'success'
                ]
        ];
        return view('test')->with($data);
    }

    public function get_tweets()
    {
    	$client = new Client(); //GuzzleHttp\Client
		$result = $client->post('http://127.0.0.1:5000/get_sentiment', [
		    'form_params' => [
		        'query' => 'Dominos',
		        'count' => 100
		    ]
		]);

		dd(json_decode($result->getBody()->getContents()));
    }
}
