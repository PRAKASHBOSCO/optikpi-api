<?php

/**
 * Response Code Manager.
 *
 * @package   OPTIKPI API
 * @author    Prakash.j <prakash.j@digient.in>
 */

return $codes = [
    /*
    |--------------------------------------------------------------------------
    | Middleware Response Code
    |--------------------------------------------------------------------------
    */
        'trackingMiddleware'            => [
            'ip_address.ip'             => 15101,
            'ip_address.required'       => 15102,
            'user_agent.required'       => 15103,
            'channel.required'          => 15104,
            'ucid.required'             => 15105,
            'channel.*'                 => 15111
        ],

        'hashCheckMiddleware'           => [
            'invalid_hash_key'          => 15106
        ],

        'authenticateMiddleware'        => [
            'appId.required'            => 15113,
            'appId.min'                 => 15114,
            'appId.max'                 => 15115,
            'appKey.required'           => 15116,
            'appKey.min'                => 15117,
            'appKey.max'                => 15118,
        ],

        'throttleRequestMiddleware'     => [
            'too_many_requests'         => 15108
        ],

        'trustedHandShakeMiddleware'    => [
            'backofficeUnauthorize'     => 15110
        ],

        'MaintainanceMode'              => [
            'success'                   => 15111,
            'false'                     => 15112
        ],

    /*
    |--------------------------------------------------------------------------
    | Common Error Response Code
    |--------------------------------------------------------------------------
    */

        'error'                     => [
            'serverError'           => 15500,
            'notFound'              => 15109
        ],

    /*
    |--------------------------------------------------------------------------
    | Optic Bonus Service Response Code
    |--------------------------------------------------------------------------
    */
        'opticBonus'                     => [
            'bonusId.required'      => 10001,
            'bonusId.string'        => 10002,
            'playerId.required'     => 10003,
            'playerId.integer'      => 10004,
            'failed'                => 10019,
            'success'               => 10020
        ],
    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */

];
