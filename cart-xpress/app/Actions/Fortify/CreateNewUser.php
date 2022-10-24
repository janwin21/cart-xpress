<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        /*
        if($input['isHired']) {
            dd('EMPLOYEEE', $input);
        } else {
            dd('CUSTOMER', $input);
        }
        */
        

        Validator::make($input, [
            'firstName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'phone' => $input['phone'],
            'profileImagePath' => $input['profileImagePath'],
            'backgroundImagePath' => $input['backgroundImagePath'],
            'acceptAgreement' => $input['acceptAgreement'],
            'isHired' => $input['isHired'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
