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

/**
 * Transaction class
 *
 * @author Prakash.j <prakash.j@digient.in>
 */
class Transaction extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Protected Properties
    |--------------------------------------------------------------------------
    */
        protected $primaryKey   = 'ID';

        protected $table        = 'transaction';

    /*
    |--------------------------------------------------------------------------
    | Constant Variables
    |--------------------------------------------------------------------------
    */
        const CREATED_AT            = 'CREATED_DATE';
        const UPDATED_AT            = 'UPDATED_DATE';

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
            $transaction                    = new Self();
            $transaction->TRANSACTION_ID    = $referenceNo;
            $transaction->BONUS_ID          = $bonusId;
            $transaction->PLAYER_ID         = $playerId;
            $transaction->STATUS            = $status;
            $transaction->RESPONSE_DATA     = $response;
            return $transaction->save();
        }
    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */
}