<?php

/**
 * Response Code Messages.
 *
 * @package   OPTIKPI API
 * @author    Prakash.j <prakash.j@digient.in>
 */

return $messages = [
    /*
    |--------------------------------------------------------------------------
    | Middleware Response Code
    |--------------------------------------------------------------------------
    */

        15113                       => 'appId field is required',
        15114                       => 'appId must be minimum 10 characters',
        15115                       => 'appId must be maximum 10 characters',
        15116                       => 'appKey field is required',
        15117                       => 'appKey must be minimum 10 characters',
        15118                       => 'appKey must be maximum 10 characters',
        15106                       => 'hash-key invalid',
    /*
    |--------------------------------------------------------------------------
    | Common Error Response Code
    |--------------------------------------------------------------------------
    */

        15500                       => 'internal server error occured',
        15109                       => 'requested url not found',

    /*
    |--------------------------------------------------------------------------
    | Optic Bonus Service Response Code
    |--------------------------------------------------------------------------
    */
        10001                       => 'bonusId field is required',
        10002                       => 'bonusId must be string',
        10003                       => 'playerId field is required',
        10004                       => 'playerId must be integer',
        10019                       => 'api resulted failed status',
        10020                       => 'optic bonus success',
    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */

];
