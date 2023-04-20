<?php
/*
Plugin Name: Twitter Feed
Plugin URI: https://brownsurfing.com/
Description: Displays Twitter posts.
Version: 1.0.0
Author: Tadeo Lemus
Author URI: https://brownsurfing.com
License: GPL2
*/

// Plugin code goes here

use Noweh\TwitterApi\Client;

$settings = [
    'account_id' => 1234567,
    'consumer_key' => 'A9BOGuHnggLg91QTcZYH4rh9w',
    'consumer_secret' => 'hNx7NOYF0H1m34GIErlrsG5pZ3P7sy0wjRnzHAXIXyez5VNId1',
    'bearer_token' => 'AAAAAAAAAAAAAAAAAAAAAIXqmgEAAAAAWDuzZ%2BVJFWIKUbbGDj2%2FxCx0RLQ%3DjbaVt6uB4t6GfXNXb7XYS6BV6bvnkcoeJH1L1ugnh4t0JRM2or',
    'access_token' => '1635300573926010880-wZpXfg5nFTlE3ke8QidTX6h2y4wji5',
    'access_token_secret' => 'Mbw7vb5Imt9sKbsZW3y3bYN0ntoosEP4SnMDeXrPy2g46'
];

$client = new Client($settings);

function twitter_shortcode() {
    global $client;

    $return = $client->tweetSearch()
        ->showMetrics()
        ->onlyWithMedias()
        ->addFilterOnUsernamesFrom([
            'twitterdev',
            'Noweh95'
        ], \Noweh\TwitterApi\Enum\Operators::or)
        ->addFilterOnKeywordOrPhrase([
            'Dune',
            'DenisVilleneuve'
        ], \Noweh\TwitterApi\Enum\Operators::and)
        ->addFilterOnLocales(['fr', 'en'])
        ->showUserDetails()
        ->performRequest()
    ;

    // Format the output as desired
    $output = '';
    foreach ($return['data'] as $tweet) {
        $output .= '<p>' . $tweet['text'] . '</p><hr>';
    }

    return $output;
}

add_shortcode('twitter_feed', 'twitter_shortcode');

?>