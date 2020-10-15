<?php
/**
 * Partner Details Model.
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
 * Partner Details class
 *
 * @author Prakash.j <prakash.j@digient.in>
 */
class PartnerDetails extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Protected Properties
    |--------------------------------------------------------------------------
    */
        protected $primaryKey   = 'PARTNER_DETAILS_ID';

        protected $table        = 'partner_details';

    /*
    |--------------------------------------------------------------------------
    | Constant Variables
    |--------------------------------------------------------------------------
    */
        const CREATED_AT            = 'PARTNER_CREATED_ON';
        const UPDATED_AT            = 'PARTNER_MODIFIED_ON';

    /*
    |--------------------------------------------------------------------------
    | Public Static Functions
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */
}