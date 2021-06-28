<?php


namespace App\GraphQL\Mutations;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserMutations
{
    public function __construct()
    {
    }

    public function getMe($_, array $args): User
    {
        return Auth::user();
    }
}
