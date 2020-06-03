<?php
require_once 'vendor/autoload.php';

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

$instance = new BongaTech("TOKEN_string");

//create multiple Sms Object(s)
$sms1= new Sms("BONGATECH", "0716079675", "Test Message 1", "101");
$sms2 = new Sms("BizTxt", "0716079675", "Test Message 2", "102");

//send Sms object
$response = $instance->sendBatchSMS($sms1, $sms2);

var_dump($response);
