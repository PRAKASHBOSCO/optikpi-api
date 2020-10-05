<?php
/**
 * Tracking Middleware.
 *
 * @package   Ace Poker
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
    use Illuminate\Validation\Validator;
    use Illuminate\Http\Request;

/**
 * Tracking Middleware Class
 * 
 * @author Prakash.j <prakash.j@digient.in>
 */
class TrackingMiddleware
{

    protected $rules = [
        // 'ip_address' => 'bail|required|ip',
        // 'user_agent' => 'required',
        'ucid'       => 'required',
        'channel'    => 'required|integer'   
    ];

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
        public function handle(Request $request, Closure $next) : Response
        {
            /* Setting Ip Address On Request */
            if(!$request->has('ip_address')){

                $request['ip_address'] = $request->ip();
            }

            /* Setting User Agent On Request */
            if(!$request->has('user_agent')){

                $request['user_agent'] = $request->server('HTTP_USER_AGENT');
            }

            if(in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1'])){

                return $next($request);

            }

            $validate = $this->validate($request);
 
            if ($validate->fails()) {

                /* Unauthorized Response */
                return returnResponse(getValidatorErrors($validate->errors()->toArray()));
        
            }
            
            return $next($request);
        }

        /**
         * Validate function
         *
         * @param \Illuminate\Http\Request $request
         * @return Validator
         */
        private function validate(Request $request) : Validator
        {
            $rules = $this->rules;

            $codes = Config::get('responsecode.trackingMiddleware');

            return customValidate($request->all(), $rules, $codes);

        }

    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */
}
