<?php
/**
 * Global Helper Function.
 *
 * @package   AcePoker
 * @author    Prakash.j <prakash.j@digient.in>
 */

    /*
    |--------------------------------------------------------------------------
    | Used Classes
    |--------------------------------------------------------------------------
    */

    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Validation\Validator as IlluminateValidator;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Request;
    use Illuminate\Support\Facades\Config;
    use Illuminate\Support\Facades\Queue;
    use GuzzleHttp\Psr7\Response as Psr7Response;
    use Illuminate\Support\Carbon;
    use Illuminate\Database\Eloquent\Collection;

/*
    |--------------------------------------------------------------------------
    | Global Helper Functions
    |--------------------------------------------------------------------------
    */

    if (!function_exists('routeUrl')) {
        /**
         * Route Url without base domain
         *
         * @param string $route
         * @return string
         * @author Prakash.j <prakash.j@digient.in>
         */
        function routeUrl(string $route) : string
        {
            /** Get Route Url */
            $url    = route($route);

            /**Spliting base url and params */
            $split  = explode(env('APP_URL'), $url);

            return (string) $split[1];

        }
    }

    if (!function_exists('sendRequest')) {
        /**
         * Dynamic Client Request Function
         *
         * @param string $url
         * @param string|GET $method
         * @param string|'' $bearerToken
         * @param array $data
         * @param boolean|false $error
         * @param array $header
         * @param boolean $json
         * @return Psr7Response
         * @author Prakash.j <prakash.j@digient.in>
         */
        function sendRequest(string $url, string $method = 'GET', string $bearerToken = '', array $data = [], bool $error = false, array $header = [], bool $json = false) : Psr7Response
        {
            /** Load Ip Address and User Agent */
            $additionalData             = getUserIpandUserAgent();

            /** Request Data */
            $data                       += $additionalData;

            /** Load Headers */
            $header                     += loadHeader();
            $header['Cache-Control']    = 'no-cache';
            $header['Authorization']    = 'Bearer '.$bearerToken;
            $header['hash-key']         = hashEncode($data);

            /** Intiated Client */
            $client                     = new Client(['http_errors' => $error, 'verify' => false, 'timeout' => 30]);

            $params                     = [];

            $params['headers']          = $header;

            if($method == 'GET')
            {
                $params['query']        = $data;
            } else {
                if($json)
                {
                    $data                  = json_encode($data);
                    $params['body']        = $data;
                    $params['headers']['Content-Type'] =  'application/json';
                }else {
                    $params['form_params']  = $data;
                }
            }

            /** Guzzle Request and Response */
            $response                   = $client->request($method, $url, $params);

            return $response;
        }
    }

    if (!function_exists('returnResponse')) {
        /**
         * Dynamic Return Response Function
         *
         * @param array $code
         * @param boolean|false $success
         * @param integer|200 $responseCode
         * @param array|null $data
         * @return Response
         * @author Prakash.j <prakash.j@digient.in>
         */
        function returnResponse(array $code, bool $success = false, int $responseCode = 200, array $data = null, array $header = []) : Response
        {
            $response                       = [
                        'success'           => $success,
                        'code'              => $code,
                        // 'firstCode'         => firstCode($code),
                        'message'           => getResponseMessages($code),
                        'data'              => $data
            ];

            return response($response, $responseCode, $header);
        }
    }

    if (!function_exists('customValidate')) {
        /**
         * Dynamic Validation Function
         *
         * @param array $request
         * @param array $rules
         * @param array $customMessages
         * @param array $customAttributes
         * @return IlluminateValidator
         * @author Prakash.j <prakash.j@digient.in>
         */
        function customValidate(array $request, array $rules, array $customMessages = [], array $customAttributes = []) : IlluminateValidator
        {
            return Validator::make($request, $rules, $customMessages, $customAttributes);
        }
    }


    if (!function_exists('getBearer')) {
        /**
         * Get Bearer Token Function
         *
         * @return string
         * @author Prakash.j <prakash.j@digient.in>
         */
        function getBearer() : string
        {
            /** Get Header Bearer Token */
            $header = Request::header('Authorization') ?? 'Bearer ';

            /** Split Bearer token */
            $bearer = explode(' ',$header);

            $bearer = isset($bearer[1]) ? $bearer : [0 => 'Bearer', 1 => ''];

            return (string) $bearer[1] ?? '';
        }
    }

    if (!function_exists('loadHeader')) {
        /**
         * Load Header For Sending Request
         *
         * @return array
         * @author Prakash.j <prakash.j@digient.in>
         */
        function loadHeader() : array
        {
            /** Get Header */
            // $header = Request::header();

            $header                 = [
                'trustedhandshake'  => Request::header('trustedhandshake')  ?? null,
                'date'              => Request::header('date')              ?? null,
            ];

            return $header;
        }
    }

    if (!function_exists('hashEncode')) {
        /**
         * Header Hash Encode Function
         *
         * @param array $data
         * @return string
         * @author Prakash.j <prakash.j@digient.in>
         */
        function hashEncode(array $data = []) : string
        {
            /** Convert Array Values To String */
            // $data = array_map('strval', $data);

            /** Encode Request Input */
            $jsonData = json_encode($data);

            if(empty($data)){
                $jsonData = "{}";
            }

            /** Generate Hash Token with sha256 Algorithm and Salt */
            $hashToken = hash('sha256', $jsonData.env('APP_KEY'));

            return $hashToken;
        }

    }

    if (!function_exists('serverError')) {
        /**
         * Server Error Response Function
         *
         * @param  Exception||null $error
         * @return Response
         * @author Prakash.j <prakash.j@digient.in>
         */
        function serverError(Exception $error = null) : Response
        {
            /** Return Response */
            $res                    = [Config::get('responsecode.error.serverError')];

            if(!empty($error)){

                $userId             = Request::Input('requestUserId') ?? "0";

                $errorData          = [
                    'errorTrace'    => explode("\n", $error->getTraceAsString()),
                    'errorMsg'      => $error->getMessage(),
                    'file'          => $error->getFile() . ':' . $error->getLine(),
                ];

                $logData            = $errorData;
                $logData['userId']  = $userId;
                $logData['action']  = "Internal Server Error";

                // event(new LogEvent($logData));

                if(env('APP_DEBUG', false) == true){

                    return returnResponse($res, false, 200, (array) $errorData);
                }
            }

            return returnResponse($res);
        }

    }

    if (!function_exists('firstCode')) {
        /**
         * Return Mobile Message
         *
         * @param array $code
         * @return array
         * @author Prakash.j <prakash.j@digient.in>
         */
        function firstCode(array $code) : int
        {
            if(isset($code[0])) {

                /** Get First Error */
                $firstError = $code[0];

            } else {

                /** Get First Error */
                $firstError = array_values($code);
                $firstError = $firstError[0][0];

            }

            return (int) $firstError;
        }

    }

    if (!function_exists('getUserIpandUserAgent')) {
        /**
         * Get User Ip And User Agent Data
         *
         * @return array
         * @author Prakash.j <prakash.j@digient.in>
         */
        function getUserIpandUserAgent() : array
        {
            $data = [];

            $data['ip_address']         = Request::Input('ip_address');

            $data['user_agent']         = Request::Input('user_agent');

            $data['channel']            = Request::Input('channel') ?? null;

            $data['ucid']               = Request::Input('ucid') ?? null;

            if(Request::has('requestUserId')){

                $data['requestUserId']  = Request::Input('requestUserId');

            }


            return (array) $data;
        }

    }

    if (!function_exists('requestDataForLog')) {

        /**
         * Request Data For Log
         *
         * @return array
         * @author Prakash.j <prakash.j@digient.in>
         */
        function requestDataForLog() : array
        {
            $routeData          = Request::route();

            if(isset($routeData[1]['uses']))
            {
                $actionName         = explode('@', $routeData[1]['uses']);
                $controllerName     = $actionName[0];
                $methodName         = $actionName[1];

                $logData = [
                    'requestData'       => Request::all(),
                    'controllerName'    => $controllerName,
                    'action'            => $methodName,
                    'middleware'        => $routeData[1]['middleware'] ?? null,
                ];
            } else {
                
                $url                    = Request::path();
                $logData                = [
                    'action'            => $url
                ];
            }

            $logData['requestHeaders']  = Request::header() ?? null;

            return $logData;

        }

    }

    if (!function_exists('getValidatorErrors')) {
        /**
         * Get Validator Errors function
         *
         * @param array $errors
         * @return array
         * @author Prakash.j <prakash.j@digient.in>
         */
        function getValidatorErrors(array $errors) : array
        {
            $data           = [];

            array_walk_recursive($errors, function($item) use (&$data) : void
            {
                $data[]     = (int) $item;
            });

            return $data;
        }

    }

    if (!function_exists('getTokenValue')) {
        /**
         * Get Token Value function
         *
         * @param string $token
         * @return array
         * @author Prakash.j <prakash.j@digient.in>
         */
        function getTokenValue(string $token) : array
        {
            $url                = env('OPTIKPI_API_URL').'api/Opticbonus/tokenValue';

            $data               = [
                'token'         => $token,
            ];

            $request            = sendRequest($url, 'POST', '', $data, true, [], true);

            $response           = (array) json_decode((string) $request->getBody()->getContents(), true);

            return $response;
        }

    }

    if (!function_exists('getResponseMessages')) {
        /**
         * Get Response Messages function
         *
         * @param array $codes
         * @return array
         * @author Prakash.j <prakash.j@digient.in>
         */
        function getResponseMessages(array $codes) : array
        {
            $messages   = Config::get('responseMessages');

            $message    = [];

            foreach($codes as $code)
            {
                $message[$code] = $messages[$code];
            }

            return $message;
        }

    }

    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */

