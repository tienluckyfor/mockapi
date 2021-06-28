<?php

namespace App\Rules;

use App\Models\RallyData;
use Illuminate\Contracts\Validation\Rule;

class DeleteCheckDataset implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
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
        return !RallyData::where('dataset_id', $value)
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This dataset is being connected with rallydata. Please remove this dataset from your rallydata first.';
    }
}
