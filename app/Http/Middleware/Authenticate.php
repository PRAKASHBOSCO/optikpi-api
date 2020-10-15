<?php
/**
 * Authenticate Middleware.
 *
 * Note : This Middleware Is Only Used For User Modules
 *
 * @package   AcePoker
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
    use App\User;

/**
 * Authenticate class
 *
 * @author Prakash.j <prakash.j@digient.in>
 */
class Authenticate
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return Response
     * @author Prakash.j <prakash.j@prakash.j@digient.in>
     */
    public function handle($request, Closure $next) : Response
    {
        $rules          = [
            'appId'     => 'bail|required|Integer',
            'appKey'    => 'bail|required'
        ];

        $codes      = Config::get('responsecode.authenticateMiddleware') ?? [];

        /** Validatate and Response */
        $validator  = customValidate($request->all(), $rules, $codes);

        if($validator->fails()) 
        {
            /** Return Response */
            $res    = getValidatorErrors($validator->errors()->toArray());

            $logData        = [
                'action'    => 'Authenticate Input Validations Failed',
                'data'      => json_encode($res)
            ];

            return returnResponse($res);
        }

        $user                   = User::leftJoin('partner_details', function($join) {
                                    $join->on('partner.PARTNER_ID', '=', 'partner_details.PARTNER_ID');
                                })
                                ->where(['partner.PARTNER_ID' => $request['appId'], 'partner_details.PARTNER_KEY' => $request['appKey']])
                                ->first() ?? null;

        if($user)
        {
            $request['user']    = $user->toArray();
            return $next($request);
        }

        return returnResponse([$codes['credentialIncorrect']]);
        
    }

    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */
}
