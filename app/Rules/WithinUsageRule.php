<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class WithinUsageRule implements Rule
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
        return (($value + auth()->user()->usage()) <= (auth()->user()->plan->storage));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El tamaño de este video excede la capacidad de su plan actual, elimine otro video o haga upgrade a un plan de mayor capacidad.';
    }
}
