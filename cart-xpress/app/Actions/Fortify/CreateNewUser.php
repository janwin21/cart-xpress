<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Http\Traits\UseUpload;
use App\Models\Customers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    use UseUpload;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'firstName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $profileImagePath = $this->upload($input['profileImagePath'], 'stored-profile');
        $backgroundImagePath = $this->upload($input['backgroundImagePath'], 'stored-background');

        $user = User::create([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'phone' => $input['phone'],
            'profileImagePath' => $profileImagePath,
            'backgroundImagePath' => $backgroundImagePath,
            'acceptAgreement' => $input['acceptAgreement'],
            'isHired' => $input['isHired'],
            'isVendor' => $input['isVendor'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        if(!$input['isHired']) {

            Customers::create([    
                'userID' => $user->id,
                'addressLine1' => $input['customer']['addressLine1'],
                'addressLine2' => $input['customer']['addressLine2'],
                'city' => $input['customer']['city'],
                'state' => $input['customer']['state'],
                'postalCode' => $input['customer']['postalCode'],
                'country' => $input['customer']['country'],
                'creditLimit' => $input['customer']['creditLimit']
            ]);

        }

        return $user;
    }
}
