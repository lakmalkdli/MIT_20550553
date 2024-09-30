<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StrongPasswordRule
{
    public function passes($attribute, $value)
    {
        // Password should have at least one uppercase, one lowercase, one number, and be at least 8 characters long
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.';
    }
}
