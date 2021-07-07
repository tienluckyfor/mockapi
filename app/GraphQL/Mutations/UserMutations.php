<?php


namespace App\GraphQL\Mutations;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserMutations
{
    public function __construct()
    {
    }

    public function editUser($_, array $args): bool
    {
//        return Auth::user();
//        dd($args);
//        dd($args);
        $payload = array_intersect_key($args, array_flip(['name', 'email', 'media_ids']));
        if(!empty($args['password'])){
            $payload['password'] = Hash::make($args['password']);
        }
        $isUpdate = User::where('id', Auth::id())
            ->update($payload);
        return $isUpdate;
    }


}
