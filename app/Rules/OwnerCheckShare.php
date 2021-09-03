<?php

namespace App\Rules;

use App\Models\Api;
use App\Models\DataSet;
use App\Models\Share;
use Illuminate\Contracts\Validation\Rule;

class OwnerCheckShare implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $shareableType, $shareableId;

    public function __construct($shareableType=null, $shareableId=null)
    {
        //
        $this->shareableType = $shareableType;
        $this->shareableId = $shareableId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if ($this->shareableType) {
            switch ($this->shareableType) {
                case 'App\Models\DataSet':
                    return DataSet::where('user_id', \auth()->id())
                        ->where('id', $this->shareableId)
                        ->exists();
                    break;
                case 'App\Models\Api':
                    return Api::where('user_id', \auth()->id())
                        ->where('id', $this->shareableId)
                        ->exists();
                    break;
            }
        }
        return Share::where('user_id', \auth()->id())
            ->where('id', $value)
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Permission denied.';
    }
}
