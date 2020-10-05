<?php
/**
 * Hash Check Middleware.
 *
 * @package   Betty Palace
 * @author    Prakash.j <prakash.j@digient.in>
 */
namespace App\Http\Middleware;

    /*
    |--------------------------------------------------------------------------
    | Used Classes
    |--------------------------------------------------------------------------
    */
    use Closure;
    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\Config;

/**
 * Hash Checking Middleware Class
 *
 * Check Request Input with Request Header Encrypted Token
 *
 * @author Prakash.j <prakash.j@digient.in>
 */
class HashCheckMiddleware
{
    /*
    |--------------------------------------------------------------------------
    | Handler Function
    |--------------------------------------------------------------------------
    */
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next) : Response
        {
            if(in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1']) || isset($_FILES)){

                return $next($request);

            }

            /** Encode Request Input */
            $hashInput = hashEncode($request->all());

            /** Get Request Header token */
            $hashedToken = $request->headers->has('hash-key') ? $request->header('hash-key') : null;

            /* Verified Token For Log Data */
            $request['verifiedHashToken'] = $hashInput;

            /* Check Hash token and Request Input */
            if ($hashInput == $hashedToken)
            {
                /* Return to app */
                return $next($request);
            }

            /* Invalid Hash Response */
            return returnResponse([Config::get('responsecode.hashCheckMiddleware.invalid_hash_key')]);
        }

    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */
}
