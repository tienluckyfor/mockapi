<?php

namespace App\Rules;

use App\Models\Resource;
use Illuminate\Contracts\Validation\Rule;

class DuplicateCheckResource implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $apiId, $sourceId, $sourceName;
    public function __construct($sourceName, $apiId, $sourceId=null)
    {
        //
        $this->sourceName = $sourceName;
        $this->apiId = $apiId;
        $this->sourceId = $sourceId;
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
        if($this->sourceId){
            return !Resource::where('api_id', $this->apiId)
                ->where('name', $this->sourceName)
                ->where('id', '!=', $this->sourceId)
                ->exists();
        }
        return !Resource::where('api_id', $this->apiId)
            ->where('name', $this->sourceName)
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Resource\'s name is exists in this Api.';
    }
}
