<?php
/**
 * Hash Check Middleware.
 *
 * @package   Ace Two Three
 * @author    Vignesh.M <Vignesh.M@digient.in>
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
    use App\Models\DefaultSettings;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Carbon;

/**
 * Hash Checking Middleware Class
 *
 * Check Request Input with Request Header Encrypted Token
 *
 * @author Vignesh.m <Vignesh.M@digient.in>
 */
class CheckMaintananceMode
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
         * @return Response
         * @author Prakash.j <prakash.j@digient.in>
         */
        public function handle($request, Closure $next) : Response
        {

            $checkMaintainanceMode  = DefaultSettings::where('KEY_VALUE','SITE_MODE')->first();

            if ($checkMaintainanceMode->ACTUAL_VALUE == 1) {
                return $next($request);
            }

            $version                = DefaultSettings::select('ACTUAL_VALUE')->where('KEY_VALUE','VERSION');
            $build                  = DefaultSettings::select('ACTUAL_VALUE')->where('KEY_VALUE','BUILD');
            $description            = DefaultSettings::select('DESCRIPTION')->where('KEY_VALUE','MAINTENANCE_MSG');
            $descriptionMsg         = DefaultSettings::select('ACTUAL_VALUE')->where('KEY_VALUE','MAINTENANCE_MSG');
            $forceAppVersion        = DefaultSettings::select('ACTUAL_VALUE')->where('KEY_VALUE','FORCE_APP_VERSION_UPDATE');
            $geoRestrictedState     = DefaultSettings::select('ACTUAL_VALUE')->where('KEY_VALUE','GEO_RESTRICTION_STATE');
            $geoAllowedCountry      = DefaultSettings::select('ACTUAL_VALUE')->where('KEY_VALUE','GEO_ALLOWED_COUNTRY');
            $appUpdateDays          = DefaultSettings::select('ACTUAL_VALUE')->where('KEY_VALUE','APP_UPDATE_MAX_DAYS');
            $optionalAppUpdate      = DefaultSettings::select('ACTUAL_VALUE')->where('KEY_VALUE','OPTIONAL_APP_UPDATE_TIME_STAMP');

            $query                  = DefaultSettings::select(DB::raw("({$version->toSql()}) as version, ({$build->toSql()}) as build, ({$description->toSql()}) as description, ({$descriptionMsg->toSql()}) as descriptionMsg, ({$forceAppVersion->toSql()}) as forceAppVersion, ({$geoRestrictedState->toSql()}) as geoRestrictedState, ({$geoAllowedCountry->toSql()}) as geoAllowedCountry, ({$appUpdateDays->toSql()}) as appUpdateDays, ({$optionalAppUpdate->toSql()}) as optionalAppUpdate"))
                                        ->mergeBindings($version->getQuery())
                                        ->mergeBindings($build->getQuery())
                                        ->mergeBindings($description->getQuery())
                                        ->mergeBindings($descriptionMsg->getQuery())
                                        ->mergeBindings($forceAppVersion->getQuery())
                                        ->mergeBindings($geoRestrictedState->getQuery())
                                        ->mergeBindings($geoAllowedCountry->getQuery())
                                        ->mergeBindings($appUpdateDays->getQuery())
                                        ->mergeBindings($optionalAppUpdate->getQuery())
                                        ->first();

            $row                    = [];
            $row['banners']         = getBanners();
            $row['description']     = $query->description;
            $row['message']         = $query->descriptionMsg;
            $row['contentVersion']  = $query->version;
            $row['appVersion']      = $query->build;
            // $row['forceAppVersionUpdate'] = (int) $query->forceAppVersion;
            $row['geoRestrictionState'] = json_decode($query->geoRestrictedState, true);
            $row['geoAllowedCountry'] = json_decode($query->geoAllowedCountry, true);

            $optionalAppUpdateTimeStamp     = Carbon::parse($query->optionalAppUpdate);
            $currentTimeStamp               = Carbon::now();
    
            $row['optionalAppUpdateMaxDays']    = (int) $query->appUpdateDays;
            $row['optionalAppUpdateTimeStamp']  = $optionalAppUpdateTimeStamp->format('Y-m-d H:i:s');
            $row['currentTimeStamp']            = $currentTimeStamp->format('Y-m-d H:i:s');
            $row['forceAppVersionUpdate']       = ($currentTimeStamp->diffInDays($optionalAppUpdateTimeStamp) > $query->appUpdateDays) ? 1 : 0;

            $codes                  = Config::get('responsecode.MaintainanceMode');

            $res                    = [
                'code'              => [$codes['success']],
                'success'           => true,
                'data'              => [$row],
            ];

            return returnResponse($res['code'], $res['success'], 200, $res['data']);
        }

    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */
}
