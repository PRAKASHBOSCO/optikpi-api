<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use App\Models\B2BTransactionHistory;


/**
 * Service Controller
 *
 * @author Prakash.j <prakash.j@digient.in>
 */
class ServiceController extends BaseController
{
    /**
     * Optic Bonus Function
     *
     * @param Request $request
     * @return Response
     * @author Prakash.j <prakash.j@digient.in>
     */
    public function opticBonus(Request $request) : Response
    {

        $rules              = [
            'bonusId'     => 'bail|required|string',
            'playerId'    => 'bail|required|integer'
        ];

        $codes      = Config::get('responsecode.opticBonus') ?? [];

        /** Validatate and Response */
        $validator  = customValidate($request->all(), $rules, $codes);

        if($validator->fails()) {

            /** Return Response */
            $res    = getValidatorErrors($validator->errors()->toArray());

            return returnResponse($res);
        }

        try {

            $url                = env('OPTIKPI_API_URL').'api/Opticbonus';

            $referenceNo        = "121".$request['user']['PARTNER_ID'].date('dmyhis');

            $data                   = [
                'bonusId'           => $request->bonusId,
                'playerId'          => $request->playerId,
                'referenceNumber'   => $referenceNo,
                'timeStamp'         => Carbon::now()->toDateTimeString()
            ];

            $clientrequest      = sendRequest($url, 'POST', '', $data, true, [], true);

            $response           = (array) json_decode((string) $clientrequest->getBody()->getContents(), true);

            $response           = getTokenValue($response['response']);

            $status             = ($response['response']['response_code'] == 100007) ? 1 : 0;

            $transaction        = B2BTransactionHistory::createTransactionLog($referenceNo, $request->bonusId, $request->playerId, $status, json_encode($response));

            if($status)
            {
                return returnResponse([$codes['success']], true, 200, $response['response']);
            }

            return returnResponse([$codes['failed']], false, 200, $response['response']);
 
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Promo List function
     *
     * @param Request $request
     * @return Response
     * @author Prakash.j <prakash.j@digient.in>
     */
    public function promoList(Request $request) : Response
    {
        $rules              = [
            'bonusType'     => 'bail|required|string',
            'page'          => 'bail|required|integer'
        ];

        $codes      = Config::get('responsecode.promoList') ?? [];

        /** Validatate and Response */
        $validator  = customValidate($request->all(), $rules, $codes);

        if($validator->fails()) {

            /** Return Response */
            $res    = getValidatorErrors($validator->errors()->toArray());

            return returnResponse($res);
        }

        try {

            $url                = env('OPTIKPI_API_URL').'api/Opticbonus/getBonus';

            $data               = [
                'bonusType'     => $request->bonusType,
                'page'          => $request->page,
            ];

            $clientrequest      = sendRequest($url, 'POST', '', $data, true, [], true);

            $response           = (array) json_decode((string) $clientrequest->getBody()->getContents(), true);

            $response           = getTokenValue($response['response']);

            $status             = ($response['response']['response_code'] == 10001) ? 1 : 0;

            if($status)
            {
                return returnResponse([$codes['success']], true, 200, $response['response']);
            }

            return returnResponse([$codes['failed']], false, 200, $response['response']);

        } catch (\Exception $e) 
        {
            throw $e;
        }


    }
}
