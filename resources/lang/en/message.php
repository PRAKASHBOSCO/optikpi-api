<?php
 /**
 * Localization for error messages
 *
 * @author Bama Devi <bamadevi@digient.in>
 */

return [
    
    /*
    |--------------------------------------------------------------------------
    | Sent Otp Services
    |--------------------------------------------------------------------------
    */
        'sendMobileOTP' => [
            'typeRequired' => 'The :attribute is Required', 
        ],
        

    /*
    |--------------------------------------------------------------------------
    | Account, Cashier Controller
    |--------------------------------------------------------------------------
    */

        'core_setting_api_error' => 'Core Setting Api error',
        'transaction_api_error'  => 'Transaction Api error',

    /*
    |--------------------------------------------------------------------------
    | Account, Payment Controller
    |--------------------------------------------------------------------------
    */

        'user_payment_transaction'              => 'User Payment Transaction',
        'user_withdraw_transaction'             => 'User Withdraw Transaction',
        'transaction_count'                     => 'Transaction Count',
        'success_transaction_count'             => 'Success Transaction Count',
        'no_data_found'                         => 'No Data Found',
        'payment_transaction_iniation_success'  => 'Payment transaction initiation success',
        'payment_user_setting_create'           => 'Created payment user setting',

    /*
    |--------------------------------------------------------------------------
    | Core Settings, CoinType Controller
    |--------------------------------------------------------------------------
    */

        'user_points_and_master_transaction_history_inserted_successfully' => 'User Points and Master Transaction History Inserted Successfully',

    /*
    |--------------------------------------------------------------------------
    | Core Settings, LevelConfig Controller
    |--------------------------------------------------------------------------
    */
        'user_points' => 'User Points',

    /*
    |--------------------------------------------------------------------------
    | Core Settings,  Transaction Controller
    |--------------------------------------------------------------------------
    */
   
        'transaction_type_and_status' => 'Transaction type and status',
    
    /*
    |--------------------------------------------------------------------------
    | Authenticate, Authenticate Controller
    |--------------------------------------------------------------------------
    */

        'success'                   => 'success',
        'ip_address_blocked'        => 'IP address blocked',
        'user_account_is_blocked'   => 'User account is blocked',
        'invalid_client'            => 'Invalid client',
        'incorrect_password'        => 'Incorrect password',
        'username_does_not_exists'  => 'Username does not exists',
        'user_is_in_active'         => 'User is InActive',
        'user_is_active'            => 'User is Active',
        'user_is_blocked'           => 'User is Blocked',
        'user_is_self_excluded'     => 'User is Self Excluded',

    /*
    |--------------------------------------------------------------------------
    | Authenticate, ChangePassword Controller
    |--------------------------------------------------------------------------
    */

        'activation_code_is_valid'      => 'Activation code is valid',
        'invalid_activation_code'       => 'Invalid activation code',
        'password'                      => 'Password',
        'password_updated_successfully' => 'Password updated successfully',
        'invalid_user_data'             => 'Invalid user data',
        'current_password'              => 'Current Password',
        'invalid_current_password'      => 'Invalid current password',
        'old_and_newpassword_both_same' => 'Old and new password both same',

    /*
    |--------------------------------------------------------------------------
    | Authenticate, ForgotPassword Controller
    |--------------------------------------------------------------------------
    */

        'please_check_your_mail_box_to_reset_your_password' => 'Please check your mail box to reset your password',
        'activation_code'                                   => 'Activation Code',
        'email_ID_doesnot_exists'                           => 'Email ID does not exists',

    /*
    |--------------------------------------------------------------------------
    | Authenticate, Logout Controller
    |--------------------------------------------------------------------------
    */

        'logout_success'    => 'Logout success',

    /*
    |--------------------------------------------------------------------------
    | Authenticate, Notification Controller
    |--------------------------------------------------------------------------
    */

        'otp_sent_successfully'         => 'OTP sent successfully',
        'email_verified_successfully'   => 'Email verified successfully',
        'mobile_verified_successfully'  => 'Mobile verified successfully',
        'link_sent_successfully'        => 'Link Sent Successfully',

    /*
    |--------------------------------------------------------------------------
    | Authenticate, Signup Controller
    |--------------------------------------------------------------------------
    */

        'registration_successfull'      => 'Registration Successfull',
        'registration_failed'           => 'Registration Failed',
        'pls_send_the_valid_data'       => 'please send the valid data',
        'available'                     => 'Available',

    /*
    |--------------------------------------------------------------------------
    | Profile, UserAccountDetails Controller
    |--------------------------------------------------------------------------
    */

        'user_account_details' => 'User Account Details',

    /*
    |--------------------------------------------------------------------------
    | Profile, UserProfile
    |--------------------------------------------------------------------------
    */

        'invalid_user_id'           => 'Invalid User Id',
        'successfully_update_the_profile_details' => 'Successfully Update the Profile Details',
        'email_Id_already_exist'    => 'Email Id already Exist',
        'mail_send_successFully'    => 'Mail Send SuccessFully',
        'user_Id_blocked'           => 'User Id Blocked',

    /*
    |--------------------------------------------------------------------------
    | Promo, PromoCampaign Controller
    |--------------------------------------------------------------------------
    */
    
        'promo_code_doesnot_exist'      => 'Promo Code does not Exist',
        'promo_code_expired_already'    => 'Promo Code Expired already',
        'promo_code_valid'              => 'Valid Promo Code',
        'max_limit_reached'             => 'Maximum Limit Reached',
        'expected_user_limit_exists'    => 'Execpeted User limit exists',
        'bonus_code_does_not_valid'     => 'Bnus Code Does Not Valid',
        'minimum_deposit_code'          => 'Minimum deposit for this code is ',
        'bonus_code_exists'             => 'Bonus Code Exists',
        'campaign_value_is_empty'       => 'Campaign Value is Empty',
        'invalid_campaign_type'         => 'Invalid Campaign type',
        'bonus_code_has_expired'        => 'Bonus code has expired',
        'empty_promo_code'              => 'Empty Promo Code',

    /*
    |--------------------------------------------------------------------------
    | Promo, RAF Controller
    |--------------------------------------------------------------------------
    */

        'user_RAF' => 'User RAF',

    /*
    |--------------------------------------------------------------------------
    | Promo, Reward UserType Controller
    |--------------------------------------------------------------------------
    */

        'rewardusertype_created_successfully' => 'RewardUserType created successfully',

    /*
    |--------------------------------------------------------------------------
    | TournamentAndGame, MiniGame Controller
    |--------------------------------------------------------------------------
    */

        'user_cash_game_mini_type' => 'User Cash Game Mini Type',

    /*
    |--------------------------------------------------------------------------
    | TournamentAndGame, TournamentUserEligibility Controller
    |--------------------------------------------------------------------------
    */

        'created_successfully' => 'Created Successfully',

    /*
    |--------------------------------------------------------------------------
    | Transaction, CashGame Controller
    |--------------------------------------------------------------------------
    */

        'user_cash_game_transaction' => 'User Cash Game Transaction',

    /*
    |--------------------------------------------------------------------------
    | Transaction, TournamentGame Controller
    |--------------------------------------------------------------------------
    */

        'user_cash_game_transaction' => 'User Cash Game Transaction',

    /*
    |--------------------------------------------------------------------------
    | Transaction, UserPoints Controller
    |--------------------------------------------------------------------------
    */

        'userpoints_and_master_transaction_history_inserted_successfully' => 'User Points and Master Transaction History Inserted Successfully',
        'user_points'                   => 'User Points',
        'withdraw_data'                 => 'Withdraw Data',
        'payment_updated_successfully'  => 'Payment Updated Successfully',
        'payment_already_updated'       => 'Payment Already Updated',
        'success_transaction_updated'   => 'Success Transaction updated',
        'withdrawal_amount_is_enter_greater_than_zero'      => 'Enter withdraw amount greater than zero',
        'you_do_not_have_sufficient_withdrawable_balance'   => 'You do not have sufficient Withdrawable balance',
        'please_fill_the_profile_details'                   => 'Please fill the profile details',
        'please_make_your_first_deposit_to_be_eligible_for_withdrawal' => 'Please make your first deposit to be eligible for withdrawal',
        'you_have_exhausted_your_quota_of_withdrawal_for_today'        => 'You have exhausted your quota of withdrawal for today',
    
    /*
    |--------------------------------------------------------------------------
    | Transaction, WithdrawSummary Controller
    |--------------------------------------------------------------------------
    */
    
        'reverted_withdrawal_successfully' => 'Reverted Withdrawal Successfully',
        'withdraw_reverted_failed'         => 'Withdraw Reverted failed',

    /*
    |--------------------------------------------------------------------------
    | Middleware, Authenticate
    |--------------------------------------------------------------------------
    */

        'unauthorized_request' => 'Unauthorized request',

    /*
    |--------------------------------------------------------------------------
    | Middleware, HashCheckMiddleware
    |--------------------------------------------------------------------------
    */

        'bad_request' => 'Bad Request',

    /*
    |--------------------------------------------------------------------------
    | Middleware, Ipmiddleware
    |--------------------------------------------------------------------------
    */

        'unauthorized_IP'       => 'Unauthorized IP',
        'unauthenticated_user'  => 'Unauthenticated User',

    /*
    |--------------------------------------------------------------------------
    | Controller
    |--------------------------------------------------------------------------
    */

        'choose_dates_inthe_timeinterval_of_last_threemonths' => 'Choose dates in the time interval of last three months',

    /*
    |--------------------------------------------------------------------------
    | Email Update
    |--------------------------------------------------------------------------
    */

        'emailUpdatedSuccess'       => 'Email Updated Successfully',
        'oldEmailandNewEmailSame'   => 'Old And New Email Were Same',

    /*
    |--------------------------------------------------------------------------
    | Mobile Update
    |--------------------------------------------------------------------------
    */

        'mobileUpdatedSuccess'      => 'Mobile Updated Successfully',
        'oldMobileandNewMobileSame' => 'Old And New Mobile Were Same',

    /*
    |--------------------------------------------------------------------------
    | User Account Verified
    |--------------------------------------------------------------------------
    */

        'userAccountVerified'           => 'User Account Have Successfully Verified',
        'userEmailNotVerified'          => 'User Email Not Verified',
        'userMobileNotVerified'         => 'User Mobile Not Verified',
        'userMobileAndEmailNotVerified' => 'User Email And Mobile Not Verified',

    /*
    |--------------------------------------------------------------------------
    | User Buy Chips
    |--------------------------------------------------------------------------
    */

        'userBuyChips_payment_type_not_found' => 'Payment Type Not Found',

    /*
    |--------------------------------------------------------------------------
    | Payment Process
    |--------------------------------------------------------------------------
    */

        'authentication_failure'        => 'Authentication Failure',
        'bad_request'                   => 'Bad Request',
        'Payment_Transaction_Success'   => 'Payment Transaction Success',
        'Payment_Already_Success'       => 'Payment Already Success',
        'Payment_Transaction_Status_Failed' => 'Payment Transaction Status Failed',

    /*
    |--------------------------------------------------------------------------
    | User Points
    |--------------------------------------------------------------------------
    */

        'your_withdraw_request_sent_successfully' => 'Your Withdraw request sent successfully',
        'amount_is_required'                      => 'Amount is required',
        'tds_calc_success'                        => 'TDS insert Success',
        'user_already_have_filled_details'        => 'User Already Have Filled Details',

    /*
    |--------------------------------------------------------------------------
    | Promo Campaign
    |--------------------------------------------------------------------------
    */

        'campaign_locked_bonus_success'     => 'Campaign Locked Bonus Success',
        'campaign_unlocked_bonus_success'   => 'Campaign Unlocked Bonus Success',

    /*
    |--------------------------------------------------------------------------
    | Helper
    |--------------------------------------------------------------------------
    */

        'something_went_wrong'      => 'Something Went Wrong',

    /*
    |--------------------------------------------------------------------------
    | Withdraw Reject Message
    |--------------------------------------------------------------------------
    */
        'processWithdrawRejectSuccess' => 'Withdraw Request Rejected Successfully',
    /*
    |--------------------------------------------------------------------------
    | Payment Transaction Status Reject Message
    |--------------------------------------------------------------------------
    */
        'paymentTransactionStatusRejectedSuccess'  => 'Payment Rejected Success',
        'paymentTransactionStatusRejectedNotFound' => 'Payment Transaction Not Found',

];
