<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Tweet;

class TweetController extends Controller
{
    public function get_sentiment(Request $request) {

    	$query = $request['query'];
    	$count = $request['count'];

    	$count_pos = 0;
		$count_neg = 0;

    	$client = new Client(); //GuzzleHttp\Client
		$result = $client->post('http://127.0.0.1:5000/get_sentiment', [
		    'form_params' => [
		        'query' => $query,
		        'count' => $count
		    ]
		]);

		$data = json_decode($result->getBody()->getContents(),true);

		$insert = array();

		foreach (array_keys($data) as $tweet) {
			$insert[] = array('text' => $tweet, 'sentiment' => $data[$tweet]);

			if($data[$tweet]=='negative'){
				$count_neg ++;
			} else {
				$count_pos++;
			}
		}

		Tweet::insert($insert);

		$view_data = array('pos_count' => $count_pos, 'neg_count' => $count_neg);

		return(view('result',compact('view_data')));
    }
}
