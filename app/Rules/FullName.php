<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FullName implements Rule
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
        // Split the name into separate parts
        $parts = explode(' ', $value);

        // Count the number of parts and ensure it is at least 4
        return count($parts) >= 3;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must match the format of your civil ID, which typically includes at least four words separated by spaces.';
    }
}
