<?php

namespace App\Rules;

use App\Models\DataSet;
use App\Models\Resource;
use Illuminate\Contracts\Validation\Rule;

class DeleteCheckApi implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $message;
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if(Resource::where('api_id', $value)->exists()){
            $this->message = 'This api is being connected with resource. Please remove this api from your resource first.';
            return false;
        }
        if(DataSet::where('api_id', $value)->exists()){
            $this->message = 'This api is being connected with dataset. Please remove this api from your dataset first.';
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
