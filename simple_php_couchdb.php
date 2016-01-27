<?php

function simple_php_couchdb_check($url) {

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json',
        'Accept: */*'
    ));

    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response, true);
}

function simple_php_couchdb_list_db($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url . '_all_dbs');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json',
        'Accept: */*'
    ));

    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response, true);
}

function simple_php_couchdb_create_db($url, $db) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url . $db);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json',
        'Accept: */*'
    ));

    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response, true);
}

function simple_php_couchdb_get_uuid($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url . '_uuids');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json',
        'Accept: */*'
    ));

    $response = curl_exec($ch);
    $_response = json_decode($response, true);

    $UUID = $_response['uuids'];

    curl_close($ch);

    return $UUID;
}

function simple_php_couchdb_set_doc($url, $db, $doc_id, $data = array()) {
    $ch = curl_init();

    $payload = json_encode($data);

    curl_setopt($ch, CURLOPT_URL, $url . $db . '/' . $doc_id);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT'); /* or PUT */
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json',
        'Accept: */*'
    ));

    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response, true);
}

function simple_php_couchdb_get_doc($url, $db, $doc_id) {
    $ch = curl_init();

    

    curl_setopt($ch, CURLOPT_URL, $url.$db.'/' . $doc_id);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json',
        'Accept: */*'
    ));

    
    $response = curl_exec($ch);

    curl_close($ch);
    
    return json_decode($response,true);
}

