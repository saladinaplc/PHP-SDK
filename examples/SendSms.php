<?php
require_once '../vendor/autoload.php';

use BongaTech\Api\BongaTech;
use BongaTech\Api\Models\Sms;

/*
    |--------------------------------------------------------------------------
    | Initiate a New BongaTech Instance
    |--------------------------------------------------------------------------
    |
    | REMEMBER to import the namespaces above to ensure code runs OK
    | or
    | Append the full namespaced path the the relevant class ....i.e BongaTech\Api\BongaTech
    |
    |TOKENS can be generated from your account, under the integrations tab.
    |BongaTech() takes in two parameters, a MANDATORY token and optional api version
    |sendSMS() takes in an SMS() Object.
    |
    */

//prefill `TOKEN_string` with your Token
$instance = new BongaTech("TOKEN_string");

//create an Sms Object
$sms= new Sms("BONGATECH", "0716079675", "Test Message 1", "101");

//send Sms object
$response = $instance->sendSMS($sms);

var_dump($response);
