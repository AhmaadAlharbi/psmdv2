<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MewEmail implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $domain = explode('@', $value)[1];
        return $domain === 'mew.gov.kw'; // Replace with your company's domain
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Only email addresses with the MEW (Ministry of Electricity and Water) domain are allowed.';
    }
}
