<?php
/**
 * User Model.
 *
 * @package   Ace Poker
 * @author    Prakash.j <prakash.j@digient.in>
 */
namespace App;

    /*
    |--------------------------------------------------------------------------
    | Used Classes
    |--------------------------------------------------------------------------
    */
    use Illuminate\Auth\Authenticatable;
    use Laravel\Lumen\Auth\Authorizable;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
    use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * User class
 *
 * @author Prakash.j <prakash.j@digient.in>
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    /*
    |--------------------------------------------------------------------------
    | Used Traits
    |--------------------------------------------------------------------------
    */

        use Authenticatable, Authorizable ;

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

       

    /*
    |--------------------------------------------------------------------------|
    |         xxxxxxxxxxxx     End Of Document     xxxxxxxxxxxxx               |
    |--------------------------------------------------------------------------|
    */

}


