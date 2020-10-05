<?php
/**
 * Ip Middleware.
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
    use App\Models\Tracking;
    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\Config;
    use Stevebauman\Location\Facades\Location as Location;

/**
 * Ip Middleware Class
 * 
 * @author Prakash.j <prakash.j@digient.in>
 */
class IpMiddleware
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


            // $location = Location::get($request->ip());

            // $request['locationTracking'] = empty($location) ? null : $location->toArray();

            // if ($request->ip() === env('PROXY', $request->ip())) {
        
                return $next($request);
            // }
            
            /* Unauthorized Response */
            return returnResponse([trans('unauthorized_IP')], Config::get('responsecode.unauthorizedIp'), false);

        }

    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */
}
