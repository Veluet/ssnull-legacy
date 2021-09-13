<?php
require_once('yelp-wrapper.php');

//get the following from http://www.yelp.com/developers/manage_api_keys


$yelp = new Yelp($consumerkey,$consumersecret,$token,$tokensecret);
$yelp->parameters[term] = 'coffee';
$yelp->parameters[location] = 'denver,co';
try {
    $yelp->query();
} catch (Exception $e) {
    print_r($e);
}
?>