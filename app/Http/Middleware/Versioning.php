<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Lumen\Routing\Router;

class Versioning
{
    /**
     * The trusted proxies for this application.
     *
     * @var array
     */
    protected $valid_api_versions = [
        'v1',
        'v2',
    ];

    public function handle($request, Closure $next)
    {

        $route = $request->route();
        $actions = $route[1]['uses'];

        // $requestedApiVersion = $this::get($request);
        // if (!$this::isValid($requestedApiVersion)) {
        //     throw up_some_error;
        // }

        $versionNamespace = $route[2]['version'];

        $action = str_replace(
            '{version}',
            $versionNamespace,
            $actions
        );
        // $router = Route::set;
        // print_r($request);die('here');
        $route->setAction($actions);

        return $next($request);
    }

     /**
     * Resolve the requested api version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return integer
     */
    public static function get($request) {
        return intval($request->header('api-version'));
    }

    /**
     * Determines if a version is valid or not
     *
     * @param integer $apiVersion
     * @return bool
     */
    public static function isValid($apiVersion) {
        return in_array(
            $apiVersion,
            array_keys(self::$valid_api_versions)
        );
    }

    /**
     * Resolve namespace for a api version
     *
     * @param integer $apiVersion
     * @return string
     */
    public static function getNamespace($apiVersion)
    {
        if (!self::isValid($apiVersion)) {
            return null;
        }

        return self::$valid_api_versions[$apiVersion];
    }

}