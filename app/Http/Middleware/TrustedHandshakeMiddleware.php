<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

class TrustedHandshakeMiddleware
{
    /**
     * Some common security headers.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string                   $role
     *
     * @return Response
     * @author Prakash.j <prakash.j@digient.in>
     */
    public function handle($request, Closure $next) : Response
    {
        /* Decryption Method */

        if($request->headers->has('trustedHandshake') && $request->headers->has('date')){

           $token           =  Crypt::decrypt($request->header('trustedHandshake'));

            $components     = explode( ':', $token);

            $requestDate    = str_replace('"', '', $request->header('date'));

            $headerDate     = Carbon::parse($requestDate);

            $date           = $headerDate->toString();

            $decryptedMsg   = openssl_decrypt(
                $components[1] ?? '', 'aes-256-cbc', env('APP_KEY').$date, null, $components[0] ?? ''
            );

            if ($decryptedMsg === false) {

                return returnResponse([Config::get('responsecode.trustedHandShakeMiddleware.backofficeUnauthorize')]);

            }

            $admin          = getAdminUser((string) $decryptedMsg);

            if(isset($admin['success']) == 1 && $admin['success'] == 1){

                $request['adminData'] = $admin['data'];

                return $next($request);

            }

            return returnResponse($admin['code']);

        }

        return $next($request);
    }
}
