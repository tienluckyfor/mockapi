<?php

namespace App\GraphQL\Validators\Mutation;

use App\Rules\OwnerCheckShare;
use Nuwave\Lighthouse\Validation\Validator;

class Create_shareValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "input.shareable_id" => [
                "required",
                new OwnerCheckShare($this->arg('input.shareable_type'), $this->arg('input.shareable_id'))
            ],
        ];
    }
}
