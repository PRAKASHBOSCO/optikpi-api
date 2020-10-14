<?php
/**
 * User Model.
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

    use Illuminate\Auth\Authenticatable;
    use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
    use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Laravel\Lumen\Auth\Authorizable;
    use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    /*
    |--------------------------------------------------------------------------
    | Used Traits
    |--------------------------------------------------------------------------
    */

        use Authenticatable, Authorizable, HasFactory;

    /*
    |--------------------------------------------------------------------------
    | Protected Properties
    |--------------------------------------------------------------------------
    */
        protected $primaryKey                   = 'PARTNER_ID';

        protected $table                        = 'partner';

    /*
    |--------------------------------------------------------------------------
    | Constant Variables
    |--------------------------------------------------------------------------
    */
        const CREATED_AT            = 'PARTNER_CREATED_ON';
        const UPDATED_AT            = 'PARTNER_MODIFIED_ON';
        const STATUS_ACTIVE         = 1;
        const STATUS_INACTIVE       = 2;
        const STATUS_BLOCKED        = 3;

    /*
    |--------------------------------------------------------------------------
    | Public Functions (Note : Public Function Can Be Called Only By Object)
    |--------------------------------------------------------------------------
    */

        //

    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */
}
