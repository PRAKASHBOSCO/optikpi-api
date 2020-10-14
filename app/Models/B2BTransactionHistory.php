<?php
/**
 * Transaction Model.
 *
 * @package   OPTIKPI API
 * @author    Prakash.j <prakash.j@digient.in>
 */
namespace App\Models;

    /*
    |--------------------------------------------------------------------------
    | Used Classes
    |--------------------------------------------------------------------------
    */

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Request;

/**
 * Transaction class
 *
 * @author Prakash.j <prakash.j@digient.in>
 */
class B2BTransactionHistory extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Protected Properties
    |--------------------------------------------------------------------------
    */
        protected $primaryKey   = 'B2B_TRANSACTION_ID';

        protected $table        = 'b2b_transaction_history';

    /*
    |--------------------------------------------------------------------------
    | Constant Variables
    |--------------------------------------------------------------------------
    */
        const CREATED_AT            = 'TRANSACTION_STARTED';
        const UPDATED_AT            = 'TRANSACTION_ENDED';

    /*
    |--------------------------------------------------------------------------
    | Public Static Functions
    |--------------------------------------------------------------------------
    */
        /**
         * Create Transaction Log function
         *
         * @param string $referenceNo
         * @param string $bonusId
         * @param integer $playerId
         * @param integer $status
         * @param string $response
         * @return boolean
         * @author Prakash.j <prakash.j@digient.in>
         */
        public static function createTransactionLog(string $referenceNo, string $bonusId, int $playerId, int $status, string $response) : bool
        {
            $user                                       = Request::Input('user');
            $transaction                                = new Self();
            $transaction->TRANSACTION_REFERENCE_NO      = $referenceNo;
            $transaction->BONUS_ID                      = $bonusId;
            $transaction->PLAYER_ID                     = $playerId;
            $transaction->TRANSACTION_STATUS            = $status;
            $transaction->RESPONSE_DATA                 = $response;
            $transaction->PARTNER_ID                    = $user['PARTNER_ID'];
            $transaction->CURRENCY                      = "INR";
            $transaction->DEVICE_TYPE                   = 1;
            return $transaction->save();
        }
    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */
}