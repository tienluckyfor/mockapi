<?php

namespace App\Rules;

use App\Models\DataSet;
use Illuminate\Contracts\Validation\Rule;

class OwnerCheckShare implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $shareableType, $shareableId;
    public function __construct($shareableType, $shareableId)
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
        switch ($this->shareableType){
            case 'App\Models\DataSet':
                return DataSet::where('user_id', \auth()->id())
                    ->where('id', $this->shareableId)
                    ->exists();
                break;
        }
//        return User::find(\auth()->id())
//
//
//            Share::where('user_id', \auth()->id())
//            ->where('id', $value)
//            ->exists();
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
