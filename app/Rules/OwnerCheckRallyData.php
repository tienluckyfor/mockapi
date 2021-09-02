<?php

namespace App\Rules;

use App\Models\DataSet;
use App\Models\RallyData;
use App\Repositories\ShareRepository;
use Illuminate\Contracts\Validation\Rule;

class OwnerCheckRallyData implements Rule
{

    protected $share_repository;

    public function __construct(
        ShareRepository $shareRepository
    ) {
        $this->share_repository = $shareRepository;
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
        $OwnerIds = $this->share_repository->getOwnerIdsByRallyId($value);
        return in_array(\auth()->id(), $OwnerIds);

//        return RallyData::where('user_id', \auth()->id())
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
