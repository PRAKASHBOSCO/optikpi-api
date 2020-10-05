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
        protected $primaryKey                   = 'USER_ID';

        protected $table                        = 'user';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'CALL_BACK_URL',
        ];

    /*
    |--------------------------------------------------------------------------
    | Constant Variables
    |--------------------------------------------------------------------------
    */
        const CREATED_AT            = 'CREATED_DATE';
        const UPDATED_AT            = 'UPDATED_DATE';

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
