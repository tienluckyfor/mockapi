<?php

namespace App\GraphQL\Validators\Mutation;

use App\Rules\DuplicateCheckResource;
use Nuwave\Lighthouse\Validation\Validator;

class Edit_resourceValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "input.name" => [
                "required",
                new DuplicateCheckResource($this->arg('input.name'), $this->arg('input.api_id'), $this->arg('input.id'))
            ],
        ];
    }
}
