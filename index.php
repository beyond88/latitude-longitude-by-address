<?php

function getGeoCode($address)
{
    $api_key = 'DIzaSeDMazf9vLhu5yjnQu16O-4dDcaYQws9-Zs';
    $address = str_replace(' ', '+', $address);
    $url = 'https://maps.google.com/maps/api/geocode/json?address='.$address.'&key='.$api_key.'';
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    $jsonData = curl_exec($curlSession);
    curl_close($curlSession);
    $json = json_decode($jsonData);
	  $data['lat'] = $json->results[0]->geometry->location->lat;
	  $data['lng'] = $json->results[0]->geometry->location->lng;
	  return $data;
}




