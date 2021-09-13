<?php

if (!isset($_GET['term']))
{
    exit();
}
if (!isset($_GET['location']))
{
    exit();
}
if (isset($_GET['offset']))
{
    $offset =  $_GET['offset'];
} else {
    $offset = 0;
}

$term = $_GET['term'];
$location = $_GET['location'];
if (preg_match("/\d/", $offset) <> 1)
{
    $offset = 0;
}
// Test the term
$pattern = "/(^[ A-Za-z ]+$)/"; // Alpha & spaces
if (preg_match($pattern, $term) <> 1)
{
    exit();
}

// Test the location
$pattern1 = '/(^[ A-Za-z \.\#\,0-9]+, ?[A-Za-z]+$)/'; // City State
$pattern2 = '/(^\d{5}(?:[-\s]\d{4})?$)/'; // Zip

if (preg_match($pattern1, $location) <> 1 AND preg_match($pattern2, $location) <> 1)
{
    exit();
}

//get the following from http://www.yelp.com/developers/manage_api_keys
$consumerkey = '6x6nOq_opy3T-Y0E398wYg';
$consumersecret = 'ihbmpxtxuru1IN9K4Nc37jOYyao';
$token = 'uO0AHNmSU5gG4dA97AEjn6GQSi_4DHix';
$tokensecret = 'J1pSZadWOu2xcxgbyRjv2VljHM4';


$url = "http://api.yelp.com/v2/search?term=$term&location=$location&sort=2&limit=1&offset=$offset";
require_once ('../lib/OAuth.php');
// Token object built using the OAuth library
$oauthtoken = new OAuthToken($token, $tokensecret);

// Consumer object built using the OAuth library
$oauthconsumer = new OAuthConsumer($consumerkey, $consumersecret);

// Yelp uses HMAC SHA1 encoding
$signature_method = new OAuthSignatureMethod_HMAC_SHA1();

// Build OAuth Request using the OAuth PHP library. Uses the consumer and token object created above.
$oauthrequest = OAuthRequest::from_consumer_and_token($oauthconsumer, $oauthtoken, 'GET', $url);

// Sign the request
$oauthrequest->sign_request($signature_method, $oauthconsumer, $oauthtoken);

// Get the signed URL
$signed_url = $oauthrequest->to_url();

// Send Yelp API Call
$ch = curl_init($signed_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch); // Yelp response
curl_close($ch);
$data = json_decode($data, true);
$name = $data['businesses'][0]['name'];
$address = $data['businesses'][0]['location']['display_address'][0] . " " . $data['businesses'][0]['location']['display_address'][1];
$image = $data['businesses'][0]['image_url'];

$category = "";
$i = 1; /* for illustrative purposes only */
$category_count = count($data['businesses'][0]['categories']);
foreach ($data['businesses'][0]['categories'] as $value)
{

    $category .= $value[0];
    if ($i < $category_count)
    {
        $category .= ", ";
    }
    $i++;
}

$response = <<<_HTML
<div class="do-this-place">
        <h2>$name</h2>
        <img src="$image" />
        <div class="categories">$category</div>
        <div class="address">$address</div>
</div>
_HTML;

echo $response;

//print_r($data);
?>